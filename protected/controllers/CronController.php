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
				'actions'=>array('result','insertTeams','getlinks','linkdata'),//
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

        public function actionResult()
        {
            $u_id = Yii::app()->user->id;
//            $isAdmin = array_key_exists($u_id, $this->admin);
            $isAdmin = 1;

            if(($_SERVER['SERVER_ADDR'] == $_SERVER['REMOTE_ADDR']) || $isAdmin)
            {

                $parserAll = new SimpleHTMLDOM;
                $htmlAll = $parserAll->file_get_html('http://www.livescore.com/soccer/2013-10-06/');
                foreach($htmlAll->find('table.league-table') as $elementAll)
                {
                    foreach ($elementAll->find('tr') as $elementTable)
                    {
                        foreach ($elementTable->find('td.fh') as $homeTeam)
                        {
                            $homeTeamName = $homeTeam->innertext;
                            echo "<pre>".$homeTeamName."</pre>";
                        }
                        foreach ($elementTable->find('td.fa') as $guestTeam)
                        {
                            $guestTeamName = $guestTeam->innertext;
                            echo "<pre>".$guestTeamName."</pre>";
                        }
                        foreach ($elementTable->find('td.fs a') as $result)
                        {
                            $resultArray = explode("-", $result->innertext);
                            $homeTeamGoals = $resultArray[0];
                            $guestTeamGoals = $resultArray[1];
                            echo "<pre>".$guestTeamGoals."</pre>";
                        }
                        echo "<pre><br /></pre>";
//                        var_dump($bla);
//                        echo "<pre>".$elementTable->innertext."</pre>";
//                        exit();
                    }
                    
//                    echo "<pre>".$elementAll->innertext."</pre>";
//                    exit();
                }
                
                exit();
            }
            else
            {
                die('Access forbiden');
            }
        }
        
        public function actionInsertTeams()
        {
            $u_id = Yii::app()->user->id;
//            $isAdmin = array_key_exists($u_id, $this->admin);
            $isAdmin = 1;

            if(($_SERVER['SERVER_ADDR'] == $_SERVER['REMOTE_ADDR']) || $isAdmin)
            {
                $leagues_array = $this->leagues_array_generate();
                
                foreach ($leagues_array as $league_name=>$league_link)
                {
//                    Insert all Leagues
                    $old_league = League::model()->findByAttributes(array('name'=>$league_name));
                    if(!$old_league)
                    {
                        $league = new League();
                        $league->name = $league_name;
                        $league->slug = SlugGenerator::slug($league_name);
                        $league->save();
                        
//                        Insert all teams from this leagues
                        $parserAll = new SimpleHTMLDOM;
                        $htmlAll = $parserAll->file_get_html($league_link);
                        foreach($htmlAll->find('td.cty') as $elementAll)
                        {
                            $old_team = Team::model()->findByAttributes(array('name'=>$elementAll->innertext));
                            if(!$old_team)
                            {
                                $team = new Team();
                                $team->name = $elementAll->innertext;
                                $team->slug = SlugGenerator::slug($elementAll->innertext);
                                $team->league_id = $league->id;
                                $team->save();
                            }
                        }
                    }
                }
            }
            else
            {
                die('Access forbiden');
            }
        }
        
        //Funkcija za generiranje na nizata so sodrze iminja i linkovi do livescore tabelata na ligata
        public function leagues_array_generate()
        {
                $leagues_array = array();
                
                //Niza od site ligi na livescore
//                Anglija
                $leagues_array['Premier League'] = "http://www.livescore.com/soccer/england/premier-league/";
                $leagues_array['Championship'] = "http://www.livescore.com/soccer/england/championship/";
                $leagues_array['England League 1'] = "http://www.livescore.co.uk/soccer/england/league-1/";
                $leagues_array['England League 2'] = "http://www.livescore.co.uk/soccer/england/league-2/";
                $leagues_array['Blue Square Premier'] = "http://www.livescore.co.uk/soccer/england/blue-square-premier/";
                $leagues_array['Blue Square North'] = "http://www.livescore.co.uk/soccer/england/blue-square-north/";
                $leagues_array['Blue Square South'] = "http://www.livescore.co.uk/soccer/england/blue-square-south/";
                $leagues_array['Evo Stik League'] = "http://www.livescore.co.uk/soccer/england/evo-stik-league/";
                $leagues_array['Zamaretto League'] = "http://www.livescore.co.uk/soccer/england/zamaretto-league/";
                $leagues_array['Ryman League'] = "http://www.livescore.co.uk/soccer/england/ryman-league/";
//                Italy
                $leagues_array['Italy Serie A'] = "http://www.livescore.com/soccer/italy/serie-a/";
                $leagues_array['Italy Serie B'] = "http://www.livescore.com/soccer/italy/serie-b/";
                $leagues_array['Italy Serie C1 A'] = "http://www.livescore.com/soccer/italy/serie-c1-a/";
                $leagues_array['Italy Serie C1 B'] = "http://www.livescore.com/soccer/italy/serie-c1-b/";
                $leagues_array['Italy Serie C2 A'] = "http://www.livescore.com/soccer/italy/serie-c2-a/";
                $leagues_array['Italy Serie C2 B'] = "http://www.livescore.com/soccer/italy/serie-c2-b/";
//                Spain
                $leagues_array['Primera Division'] = "http://www.livescore.com/soccer/spain/primera-division/";
                $leagues_array['Secunda Division'] = "http://www.livescore.com/soccer/spain/segunda-division/";
                $leagues_array['Secunda B Group 1'] = "http://www.livescore.com/soccer/spain/segunda-b-group-i/";
                $leagues_array['Secunda B Group 2'] = "http://www.livescore.com/soccer/spain/segunda-b-group-ii/";
                $leagues_array['Secunda B Group 3'] = "http://www.livescore.com/soccer/spain/segunda-b-group-iii/";
                $leagues_array['Secunda B Group 4'] = "http://www.livescore.com/soccer/spain/segunda-b-group-iv/";
//                Germany
                $leagues_array['Bundesliga'] = "http://www.livescore.com/soccer/germany/bundesliga/";
                $leagues_array['Bundesliga 2'] = "http://www.livescore.com/soccer/germany/2-bundesliga/";
                $leagues_array['Liga 3'] = "http://www.livescore.com/soccer/germany/3-liga/";
                $leagues_array['Regionalliga Bayern'] = "http://www.livescore.com/soccer/germany/regionalliga-bayern/";
                $leagues_array['Regionalliga North'] = "http://www.livescore.com/soccer/germany/regionalliga-north/";
                $leagues_array['Regionalliga Nordost'] = "http://www.livescore.com/soccer/germany/regionalliga-nordost/";
                $leagues_array['Regionalliga West'] = "http://www.livescore.eu/soccer/germany/regionalliga-west/";
                $leagues_array['Regionalliga Sudwest'] = "http://www.livescore.com/soccer/germany/regionalliga-sudwest/";
//                France
                $leagues_array['Ligue 1'] = "http://www.livescore.com/soccer/france/ligue-1/";
                $leagues_array['Ligue 2'] = "http://www.livescore.com/soccer/france/ligue-2/";
                $leagues_array['Championnat National'] = "http://www.livescore.com/soccer/france/championnat-national/";
                $leagues_array['CFA Group A'] = "http://www.livescore.com/soccer/france/cfa-group-a/";
                $leagues_array['CFA Group B'] = "http://www.livescore.com/soccer/france/cfa-group-b/";
                $leagues_array['CFA Group C'] = "http://www.livescore.com/soccer/france/cfa-group-c/";
                $leagues_array['CFA Group D'] = "http://www.livescore.com/soccer/france/cfa-group-d/";
//                Netherland
//                Belgium
//                Portugal
//                Scotland
//                $leagues_array['League'] = "";
                
            return $leagues_array;
        }
        
        public function actionGetlinks()
        {
            $pagesLinks = array();
            $parserAll = new SimpleHTMLDOM;
            $htmlAll = $parserAll->file_get_html('https://www.interwetten.com/en/sportsbook/l/115061/wta-osaka');
            foreach($htmlAll->find('div.moreinfo') as $elementAll)
            {
                foreach ($elementAll->find('a') as $link)
                {
                    $pagesLinks[] = "https://www.interwetten.com".$link->href;
                }
            }
            var_dump($pagesLinks);
            exit();
        }
        
        
        public function actionLinkdata()
        {
            $pagesLinks = array();
            $parserAll = new SimpleHTMLDOM;
            $htmlAll = $parserAll->file_get_html('https://www.interwetten.com/en/sportsbook/e/9864220/arsenal-dortmund');
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
                    
//                    echo $game_type[0]->innertext."<br />";
                }
            }
//            echo $htmlTableDivs[0]->innertext;
//            var_dump($htmlArray);
//            $coefficients_json = json_encode($this->game['coefficients']);
            var_dump($this->game);
            exit();
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
            $date = trim($dateHtml[0]->innertext);
            
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
        
//        public function sportGameName($htmlDiv, $game_type)
//        {
//            
//        }
}