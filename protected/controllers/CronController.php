<?php

class CronController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        public $game = array();

        /**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('gettournaments','gettournament','tournamentlinks','getodds','result','insertTeams','linkdata'),//
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
//Separated action, get all tournaments from some sport and add them into database table tournament
        public function actionGettournaments()
        {
            $criteria1  = new CDbCriteria();
            $criteria1->addCondition("active = 1");
            $sports = Sport::model()->findAll($criteria1);
            
            foreach ($sports as $sport)
            {
                $parserAll = new SimpleHTMLDOM;
                $htmlAll = $parserAll->file_get_html($sport->link);
                $htmlTable = $htmlAll->find('div#divOfferTarget');
                
                foreach ($htmlTable[0]->find('td a') as $tournament_a)
                {
                    $tournament_name = trim($tournament_a->innertext);
                    $tournament_link = $tournament_a->href;
                    
                    $criteria2 = new CDbCriteria();
                    $criteria2->addCondition('name = :tournament_name');
                    $criteria2->params[":tournament_name"] = $tournament_name;
                    $tournament = Tournament::model()->find($criteria2);
                    if(!$tournament)
                    {
                        $tournament = new Tournament();
                        $tournament->name = $tournament_name;
                        $tournament->link = "https://www.interwetten.com".$tournament_link;
                        $tournament->active = 1;
                        $tournament->sport_id = $sport->id;
                        $tournament->save();
                    }
                }
            }
            echo 'Successfully generated tournaments into database!';
            exit();
        }
        
//        Cron get tournament
        public function actionGettournament()
        {
            $criteria1  = new CDbCriteria();
            $criteria1->addCondition("active = 1");
//            $criteria1->addCondition("");//Uslov za crono da ne se povtoruva na istio tournament
            $criteria1->order = "cron_group";
            $criteria1->limit = 1;
            $tournament = Tournament::model()->find($criteria1);
            
            $this->actionTournamentLinks($tournament->id);
        }

//        Get all links for given tournament
        public function actionTournamentlinks($id=0)
        {
            $tournament = Tournament::model()->findByPk($id);
            $sport = $tournament->sport->name;
//            $i=0;
            $parserAll = new SimpleHTMLDOM;
            $htmlAll = $parserAll->file_get_html($tournament->link);
            foreach($htmlAll->find('div.moreinfo') as $elementAll)
            {
                foreach ($elementAll->find('a') as $link)
                {
//                    $i++;
//                    if($i<=2){
                    $match_link = "https://www.interwetten.com".$link->href;
                    $this->actionGetodds($match_link, $sport);
                    //Here go action for getting odds. Row abowe not need
//                    }
                    
                }
            }
            var_dump($this->game);
                    exit();
        }
        
        //Get odds for given match link. Add this as link in admin part
        public function actionGetodds($match_link, $sport)
        {
            $pagesLinks = array();
            $parserAll = new SimpleHTMLDOM;
            $htmlAll = $parserAll->file_get_html($match_link);
            $htmlTableDivs = $htmlAll->find('div.containerContentTable');
            $htmlArray = explode('<div>', trim($htmlTableDivs[0]->innertext));
            
            $this->sportSetHomeGuest($htmlAll);//Set home/guest
            $this->foodballSetDateTime($htmlAll);//Set date and time
            
            //All divs one-by-one
            foreach ($htmlArray as $elementDiv)
            {
                if(trim($elementDiv) != '')
                {
                    $parserDiv = new SimpleHTMLDOM;
                    $htmlDiv = $parserDiv->str_get_html($elementDiv);
                    
//                    Now we search in current div to find which game is in this div
                    $htmlElement = $htmlDiv->find('.offertype');
                    $game_type = $htmlElement[0]->find('span');//Will return game type, like handicap, First goal etc.
                    
                    if($sport == "Football")
                    {
                        $this->foodballOdds($htmlDiv, $game_type);
                    }
                    else if($sport == "Tennis")
                    {
                        $this->tennisOdds($htmlDiv, $game_type);
                    }
                    else if($sport == "Ice hockey")
                    {
                        $this->icehockeyOdds($htmlDiv, $game_type);
                    }
                }
            }
        }
        
        public function foodballOdds($htmlDiv, $game_type)
        {
            if(trim($game_type[0]->innertext) == 'Match')
            {
                $this->foodballMatch($htmlDiv, $game_type);
            }
            else if((trim(preg_match('/handicap/',$game_type[0]->innertext)) 
                    || trim(preg_match('/Handicap/',$game_type[0]->innertext)))
                    && preg_match('/:/',$game_type[0]->innertext))
            {
                $this->foodballHandicap($htmlDiv, $game_type);
            }
            else if(trim($game_type[0]->innertext) == 'Double Chance')
            {
                $this->foodballDoubleChance($htmlDiv, $game_type);
            }
            else if(trim($game_type[0]->innertext) == 'First goal')
            {
                $this->foodballFirstGoal($htmlDiv, $game_type);
            }
            else if(trim($game_type[0]->innertext) == 'How many goals')
            {
                $this->foodballHowManyGoals($htmlDiv, $game_type);
            }
            else if(trim($game_type[0]->innertext) == 'Time first goal')
            {
                $this->foodballTimeFirstGoal($htmlDiv, $game_type);
            }
            else if(trim($game_type[0]->innertext) == 'When 1st goal')
            {
                $this->foodballWhenFirstGoal($htmlDiv, $game_type);
            }
            else if(trim($game_type[0]->innertext) == 'HalfTime')
            {
                $this->foodballHalfTime($htmlDiv, $game_type);
            }
            else if(trim($game_type[0]->innertext) == 'Asian 0 Ball Handicap')
            {
                $this->foodballAsianHandicap($htmlDiv, $game_type);
            }
            else if(trim($game_type[0]->innertext) == 'Half-Time/Full-Time')
            {
                $this->foodballHalfTimeFullTime($htmlDiv, $game_type);
            }
            else if(trim($game_type[0]->innertext) == 'Correct Score')
            {
                $this->foodballCorrectScore($htmlDiv, $game_type);
            }
            else if(trim($game_type[0]->innertext) == 'Goals')
            {
                $this->foodballGoals($htmlDiv, $game_type);
            }
        }
        
        public function tennisOdds($htmlDiv, $game_type)
        {
            if(trim($game_type[0]->innertext) == 'Game')
            {
                $this->tennisGame($htmlDiv, $game_type);
            }
            else if(trim($game_type[0]->innertext) == 'Handicap 1.5 Sets')
            {
                $this->tennisHendicap($htmlDiv, $game_type);
            }
            else if(trim($game_type[0]->innertext) == 'Who wins first Set')
            {
                $this->tennisFirstSet($htmlDiv, $game_type);
            }
            else if(trim($game_type[0]->innertext) == 'Set betting')
            {
                $this->tennisSetBetting($htmlDiv, $game_type);
            }
        }
        
        public function icehockeyOdds($htmlDiv, $game_type)
        {
            if(trim($game_type[0]->innertext) == 'Winning Team')
            {
                $this->hockeyWinning($htmlDiv, $game_type);
            }
            else if(trim($game_type[0]->innertext) == 'How many goals 0-5/6+')
            {
                $this->hockeyGoals($htmlDiv, $game_type);
            }
            else if(trim($game_type[0]->innertext) == '1st period')
            {
                $this->hockeyFirstPeriod($htmlDiv, $game_type);
            }
            else if(trim($game_type[0]->innertext) == 'How many goals in 1st period')
            {
                $this->hockeyGoalsFirstPeriod($htmlDiv, $game_type);
            }
        }

        //Set home and guest teams. Can be used in any sport
        public function sportSetHomeGuest($htmlAll)
        {
            $divHtml = $htmlAll->find('.containerHeadline');
            $elementDiv = trim($divHtml[0]->innertext);
            
            $parserDiv = new SimpleHTMLDOM;
            $htmlDiv = $parserDiv->str_get_html($elementDiv);
            $teamsHtml = $htmlAll->find('.head');
            $home_guest_html = trim($teamsHtml[0]->innertext);
            
            $home_guest_array = explode('-', $home_guest_html);
            $home_team = trim($home_guest_array[0]);
            $guest_team = trim($home_guest_array[1]);
            
            $this->game['teams']['home'] = $home_team;
            $this->game['teams']['guest'] = $guest_team;
        }
        
        public function foodballSetDateTime($htmlAll)
        {
            $dateHtml = $htmlAll->find('.offerDate');
            $date_trimmed = trim($dateHtml[0]->innertext);
            $date_array = explode('.', $date_trimmed);
            $day = $date_array[0];
            $month = $date_array[1];
            $year = '20'.$date_array[2];
            $date = $year.'-'.$month.'-'.$day;
            
            $timeHtml = $htmlAll->find('.time2');
            $time_array = explode('</var>',$timeHtml[0]->innertext);
            
            $date_time = $date.' '.trim($time_array[1]);
            
            $this->game['date'] = $date_time;
        }
        
        public function foodballMatch($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');
                        
            $this->game['coefficients']['match']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['match']['1'] = $odds[0]->innertext;
            $this->game['coefficients']['match']['x'] = $odds[1]->innertext;
            $this->game['coefficients']['match']['2'] = $odds[2]->innertext;
        }
        
        public function foodballHandicap($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');
                        
            $this->game['coefficients']['handicap']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['handicap']['1'] = $odds[0]->innertext;
            $this->game['coefficients']['handicap']['x'] = $odds[1]->innertext;
            $this->game['coefficients']['handicap']['2'] = $odds[2]->innertext;
        }
        
        public function foodballDoubleChance($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');
                        
            $this->game['coefficients']['double-chance']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['double-chance']['1x'] = $odds[0]->innertext;
            $this->game['coefficients']['double-chance']['x2'] = $odds[1]->innertext;
        }
        
        public function foodballFirstgoal($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');
                        
            $this->game['coefficients']['first-goal']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['first-goal']['home'] = $odds[0]->innertext;
            $this->game['coefficients']['first-goal']['guest'] = $odds[1]->innertext;
        }
        
        public function foodballHowManyGoals($htmlDiv, $game_type)
        {
            $this->game['coefficients']['how-many-goals']['label'] = trim($game_type[0]->innertext);
            $odds = $htmlDiv->find('.odds');
            $span_name = $htmlDiv->find('span.name');

            $i = 0;
            foreach ($span_name as $span)
            {
                $label = $span->innertext;
                if($label == trim('3 or more')){ $label = '3+'; }
                else if($label == trim('NO goal')){ $label = '0'; }
                else if($label == trim('1 or more')){ $label = '1+'; }
                else if($label == trim('2 or more')){ $label = '2+'; }
                else if($label == trim('4 or more')){ $label = '4+'; }
                else if($label == trim('5 or more')){ $label = '5+'; }

                $this->game['coefficients']['how-many-goals'][$label] = $odds[$i]->innertext;
                $i++;
            }
        }
        
        public function foodballTimeFirstGoal($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');

            $this->game['coefficients']['time-first-goal']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['time-first-goal']['1-29'] = $odds[0]->innertext;
            $this->game['coefficients']['time-first-goal']['30+'] = $odds[1]->innertext;
        }
        
        public function foodballWhenFirstGoal($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');
            $this->game['coefficients']['when-first-goal']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['when-first-goal']['1-10'] = $odds[0]->innertext;
            $this->game['coefficients']['when-first-goal']['11-20'] = $odds[1]->innertext;
            $this->game['coefficients']['when-first-goal']['21-30'] = $odds[2]->innertext;
            $this->game['coefficients']['when-first-goal']['31-40'] = $odds[3]->innertext;
            $this->game['coefficients']['when-first-goal']['41-50'] = $odds[4]->innertext;
            $this->game['coefficients']['when-first-goal']['51-60'] = $odds[5]->innertext;
            $this->game['coefficients']['when-first-goal']['61-70'] = $odds[6]->innertext;
            $this->game['coefficients']['when-first-goal']['71-80'] = $odds[7]->innertext;
            $this->game['coefficients']['when-first-goal']['81+'] = $odds[8]->innertext;
        }
        
        public function foodballHalfTime($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');
                        
            $this->game['coefficients']['half-time']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['half-time']['1'] = $odds[0]->innertext;
            $this->game['coefficients']['half-time']['x'] = $odds[1]->innertext;
            $this->game['coefficients']['half-time']['2'] = $odds[2]->innertext;
        }
        
        public function foodballAsianHandicap($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');
                        
            $this->game['coefficients']['asian-handicap']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['asian-handicap']['1'] = $odds[0]->innertext;
            $this->game['coefficients']['asian-handicap']['2'] = $odds[1]->innertext;
        }
        
        public function foodballHalfTimeFullTime($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');
                        
            $this->game['coefficients']['half-full-time']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['half-full-time']['H/H'] = $odds[0]->innertext;
            $this->game['coefficients']['half-full-time']['X/H'] = $odds[1]->innertext;
            $this->game['coefficients']['half-full-time']['G/H'] = $odds[2]->innertext;
            $this->game['coefficients']['half-full-time']['H/X'] = $odds[3]->innertext;
            $this->game['coefficients']['half-full-time']['X/X'] = $odds[4]->innertext;
            $this->game['coefficients']['half-full-time']['G/X'] = $odds[5]->innertext;
            $this->game['coefficients']['half-full-time']['H/G'] = $odds[6]->innertext;
            $this->game['coefficients']['half-full-time']['X/G'] = $odds[7]->innertext;
            $this->game['coefficients']['half-full-time']['G/G'] = $odds[8]->innertext;
        }
        
        public function foodballCorrectScore($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');
                        
            $this->game['coefficients']['correct-score']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['correct-score']['1:0'] = $odds[0]->innertext;
            $this->game['coefficients']['correct-score']['0:0'] = $odds[1]->innertext;
            $this->game['coefficients']['correct-score']['0:1'] = $odds[2]->innertext;

            $this->game['coefficients']['correct-score']['2:0'] = $odds[3]->innertext;
            $this->game['coefficients']['correct-score']['1:1'] = $odds[4]->innertext;
            $this->game['coefficients']['correct-score']['0:2'] = $odds[5]->innertext;

            $this->game['coefficients']['correct-score']['2:1'] = $odds[6]->innertext;
            $this->game['coefficients']['correct-score']['2:2'] = $odds[7]->innertext;
            $this->game['coefficients']['correct-score']['1:2'] = $odds[8]->innertext;

            $this->game['coefficients']['correct-score']['3:0'] = $odds[9]->innertext;
            $this->game['coefficients']['correct-score']['3:3'] = $odds[10]->innertext;
            $this->game['coefficients']['correct-score']['0:3'] = $odds[11]->innertext;

            $this->game['coefficients']['correct-score']['3:1'] = $odds[12]->innertext;
            $this->game['coefficients']['correct-score']['4:4'] = $odds[13]->innertext;
            $this->game['coefficients']['correct-score']['1:3'] = $odds[14]->innertext;

            $this->game['coefficients']['correct-score']['3:2'] = $odds[15]->innertext;
            $this->game['coefficients']['correct-score']['2:3'] = $odds[16]->innertext;

            $this->game['coefficients']['correct-score']['4:0'] = $odds[17]->innertext;
            $this->game['coefficients']['correct-score']['0:4'] = $odds[18]->innertext;

            $this->game['coefficients']['correct-score']['4:1'] = $odds[19]->innertext;
            $this->game['coefficients']['correct-score']['1:4'] = $odds[20]->innertext;

            $this->game['coefficients']['correct-score']['4:2'] = $odds[21]->innertext;
            $this->game['coefficients']['correct-score']['2:4'] = $odds[22]->innertext;


            $this->game['coefficients']['correct-score']['4:3'] = $odds[23]->innertext;
            $this->game['coefficients']['correct-score']['3:4'] = $odds[24]->innertext;

            $this->game['coefficients']['correct-score']['5:0'] = $odds[25]->innertext;
            $this->game['coefficients']['correct-score']['0:5'] = $odds[26]->innertext;

            $this->game['coefficients']['correct-score']['5:1'] = $odds[27]->innertext;
            $this->game['coefficients']['correct-score']['1:5'] = $odds[28]->innertext;

            $this->game['coefficients']['correct-score']['5:2'] = $odds[29]->innertext;
            $this->game['coefficients']['correct-score']['2:5'] = $odds[30]->innertext;
        }
        
        public function foodballGoals($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');
                        
            $this->game['coefficients']['goals']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['goals']['0'] = $odds[0]->innertext;
            $this->game['coefficients']['goals']['1'] = $odds[1]->innertext;
            $this->game['coefficients']['goals']['2'] = $odds[2]->innertext;
            $this->game['coefficients']['goals']['3'] = $odds[3]->innertext;
            $this->game['coefficients']['goals']['4'] = $odds[4]->innertext;
            $this->game['coefficients']['goals']['5+'] = $odds[5]->innertext;
        }

        public function tennisGame($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');
                        
            $this->game['coefficients']['game']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['game']['1'] = $odds[0]->innertext;
            $this->game['coefficients']['game']['2'] = $odds[1]->innertext;
        }

        public function tennisHendicap($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');
                        
            $this->game['coefficients']['hendicap-1.5']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['hendicap-1.5']['-1.5'] = $odds[0]->innertext;
            $this->game['coefficients']['hendicap-1.5']['+1.5'] = $odds[1]->innertext;
        }
        
        public function tennisFirstSet($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');
                        
            $this->game['coefficients']['first-set']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['first-set']['1FS'] = $odds[0]->innertext;
            $this->game['coefficients']['first-set']['2FS'] = $odds[1]->innertext;
        }

        public function tennisSetBetting($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');
                        
            $this->game['coefficients']['set-score']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['set-score']['2:0'] = $odds[0]->innertext;
            $this->game['coefficients']['set-score']['0:2'] = $odds[1]->innertext;
            $this->game['coefficients']['set-score']['2:1'] = $odds[2]->innertext;
            $this->game['coefficients']['set-score']['1:2'] = $odds[3]->innertext;
        }

        public function hockeyWinning($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');
                        
            $this->game['coefficients']['winning-team']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['winning-team']['1'] = $odds[0]->innertext;
            $this->game['coefficients']['winning-team']['2'] = $odds[1]->innertext;
        }

        public function hockeyGoals($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');
                        
            $this->game['coefficients']['goals']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['goals']['0-5'] = $odds[0]->innertext;
            $this->game['coefficients']['goals']['6+'] = $odds[1]->innertext;
        }

        public function hockeyFirstPeriod($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');
                        
            $this->game['coefficients']['first-period']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['first-period']['1'] = $odds[0]->innertext;
            $this->game['coefficients']['first-period']['x'] = $odds[1]->innertext;
            $this->game['coefficients']['first-period']['2'] = $odds[2]->innertext;
        }

        public function hockeyGoalsFirstPeriod($htmlDiv, $game_type)
        {
            $odds = $htmlDiv->find('.odds');
                        
            $this->game['coefficients']['goals-first-period']['label'] = trim($game_type[0]->innertext);
            $this->game['coefficients']['goals-first-period']['0-1'] = $odds[0]->innertext;
            $this->game['coefficients']['goals-first-period']['2+'] = $odds[1]->innertext;
        }
        
//        public function sportGameName($htmlDiv, $game_type)
//        {
//            
//        }
}