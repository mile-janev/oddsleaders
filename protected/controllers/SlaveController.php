<?php

class SlaveController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

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
				'actions'=>array('odds','getlinks', 'linkdata'),//
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
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
        $html = '';
//            $niza = array();
        $pagesLinks = array();
        $parserAll = new SimpleHTMLDOM;
        $htmlAll = $parserAll->file_get_html('https://www.interwetten.com/en/sportsbook/e/9864220/arsenal-dortmund');
        $htmlTableDivs = $htmlAll->find('div.containerContentTable');
        $htmlArray = explode('<div>', trim($htmlTableDivs[0]->innertext));
        
        preg_match_all('/<div class=\"offerDate\">(.*?)<\/div>/s', $htmlArray[1], $date);
        preg_match_all('/<div class=\"time2\">(.*?)<\/div>/s', $htmlArray[1], $time);
        $date = trim($date[1][0]);
        $time = trim(strip_tags($time[1][0]));
        $start = $date.' '.$time;

        foreach ($htmlArray as $elementDiv)
        {
            preg_match_all('/<div class=\"offertype\">(.*?)<\/div>/si', $elementDiv, $type);
            foreach ($type as $key => $value) {
                if(isset($value[0]))
                {
                    print_r(strip_tags($value[0]));
                }
            }

        }
        //echo $htmlTableDivs[0]->innertext;
//            var_dump($htmlArray);
        exit();
    }

        public function actionOdds()
        {
            $u_id = Yii::app()->user->id;
//            $isAdmin = array_key_exists($u_id, $this->admin);
            $isAdmin = 1;
            $develop = '1';
            $sports = array('Football');
            $events = array('Eng. Premier League','French Ligue 1','Italian Serie A','Spanish Liga Primera');
            $choice = array('Ftb_Mr3', 'Ftb_Htf', 'Ftb_Dbc', 'Ftb_10'); // Code for available tips
            $tips = array('%1%' => '1', 'Draw' => 'X', '%2%' => '2',
            				'%1% / Draw' => '1/X', 'Draw / %1%' => 'X/1', 'Draw / Draw' => 'X/X', 'Draw / %2%' => 'X/2', '%2% / Draw' => '2/X', '%1% / %1%' => '1/1', '%2% / %1%' => '2/1', '%1% / %2%' => '1/2', '%2% / %2%' => '2/2',
            				'%1% or Draw' => '1X', '%1% or %2%' => '12', 'Draw or %2%' => 'X2',
            				'Over 0.5' => '1+', 'Over 1.5' => '2+', 'Over 2.5' => '3+', 'Over 3.5' => '4+', 'Over 4.5' => '5+', 'Over 5.5' => '6+', 'Over 6.5' => '7+', 'Over 7.5' => '8+', 'Under 0.5' => '0', 'Under 1.5' => '0-1', 'Under 2.5' => '0-2', 'Under 3.5' => '0-3', 'Under 4.5' => '0-4', 'Under 5.5' => '0-5', 'Under 6.5' => '0-6', 'Under 7.5' => '0-8'
            				);


            if(($_SERVER['SERVER_ADDR'] == $_SERVER['REMOTE_ADDR']) || $isAdmin)
            {
                if ($develop === '1') 
                {
                    $url = 'http://xml.cdn.betclic.com/odds_en.xml';
                }
                else
                {
                    $url = 'http://www.dev/odds.xml';
                }

                $html = simplexml_load_file($url);

                foreach ($html->sport as $sport) 
                {
                    if (in_array((string) $sport->attributes()->name, $sports)) 
                    {
                        foreach ($sport->event as $event) 
                        {
                            if (in_array($event->attributes()->name, $events)) 
                            {
                                $i = 0;
                                foreach ($event->match as $match) 
                                {
                                    $teams = explode(' - ', $match->attributes()->name);
                                    if (isset($teams[1])) 
                                    {
                                        $game[$i]['home'] = $teams[0];
                                        $game[$i]['away'] = $teams[1];
                                        $game[$i]['start'] = date('Y-m-d H:i', strtotime((string)$match->attributes()->start_date));
                                        foreach ($match->bets as $bets) 
                                        {
                                            foreach ($bets->bet as $bet) 
                                            {
                                                if (in_array($bet->attributes()->code, $choice)) 
                                                {
                                                    foreach ($bet->choice as $odds) 
                                                    {
                                                        $game[$i]['bets'][$tips[(string) $odds->attributes()->name]] = (string) $odds->attributes()->odd;
                                                        $tipovi[$i][$tips[(string) $odds->attributes()->name]] = (string) $odds->attributes()->odd;
                                                    }
                                                    
                                                    //Zacuvuva vo baza utakmica
                                                    $this->saveGame($game[$i]);
                                                }
                                            }
                                        }
                                    }
                                    $i++;
                                }
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
        
        public function saveGame($game)
        {
            $odds_json = json_encode($game['bets']);
            
            $team_home = Team::model()->findByAttributes(array('name'=>$game['home']));
            $team_guest = Team::model()->findByAttributes(array('name'=>$game['away']));
            
            if($team_home && $team_guest)//If both teams exist in database
            {
                $criteria1 = new CDbCriteria();
                $criteria1->addCondition("home_id = :home_id");
                $criteria1->params[":home_id"] = $team_home->id;
                $criteria1->addCondition("guest_id = :guest_id");
                $criteria1->params[":guest_id"] = $team_guest->id;
                $game_inserted = Game::model()->findAll($criteria1);
                
                if(!$game_inserted)//If game is not inserted
                {
                    $game_new = new Game();
                    $game_new->home_id = $team_home->id;
                    $game_new->guest_id = $team_guest->id;
                    $game_new->start = $game['start'];

                    $saved = $game_new->save();
                    
                    $coefficient = new Coefficient();
                    $coefficient->house_id = 1;
                    $coefficient->game_id = $game_new->id;
                    $coefficient->odds = $odds_json;
                    $coefficient->save();
                }
            }
            
//            var_dump($saved);
//            exit();
            return TRUE;
        }
}