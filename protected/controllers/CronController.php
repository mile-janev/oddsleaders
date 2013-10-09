<?php

class CronController extends Controller
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
				'actions'=>array('result','insertTeams','getteamlinks'),//
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
        
        public function actionGetteamlinks()
        {
            $pages = array();
            $parserAll = new SimpleHTMLDOM;
            $htmlAll = $parserAll->file_get_html('https://www.interwetten.com/en/sportsbook/l/115061/wta-osaka');
            foreach($htmlAll->find('div.moreinfo') as $elementAll)
            {
                foreach ($elementAll->find('a') as $link)
                {
                    $pages[] = "https://www.interwetten.com/".$link->href;
                }
            }
            var_dump($pages);
            exit();
        }
}