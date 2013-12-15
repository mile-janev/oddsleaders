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
				'actions'=>array('cron','calculatewin','getxml', 'test'),
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
        
        /**
         * Main cron action. This will controll executing of other actions (In future).
         */
        public function actionCron()
        {
            
            exit();
        }

        /**
         * Checking is this ticked winner.
         */
        public function actionCalculatewin()
        {
            $tickets = Ticket::model()->findAll();
            foreach ($tickets as $ticket) {
                $ticketFinished = true;
                $tickedWinned = 1;
                foreach ($ticket->games as $game) {
                    if ($game->status == 0) {
                        $status = $this->calculateGame($game);
                        if ($status == 0) {
                            $ticketFinished = false;
                        } else {
                            $game->status = $status;
                            $game->update();
                            if ($status == 2) {
                                $tickedWinned = 2;
                            }
                        }
                    }
                }
                if ($ticketFinished) {
                    $ticket->status = $tickedWinned;
                    $ticket->update();
                }
            }
            
            exit();
        }
        
        /**
         * Check is this game winner or not.
         * @param type $game
         * @return boolean (winner or not)
         */
        public function calculateGame($game)
        {
            $status = 0;
            $data = json_decode($game->stack->data);
            if (isset($data->score)) { //If isset then game is finished.
                $game->score = $data->score->team1.":".$data->score->team2;
                if ($game->stack->tournament->sport->name == 'Football') {
                    switch ($game->game_type) {
                        case 'match': $status = $this->x12Sport($game, $data);  break;
                        case 'handicap': $status = $this->handicap($game, $data);  break;
                        case 'half-time': $status = $this->x12Sport($game, $data);  break;
                        case 'double-chance': $status = $this->double_chance($game, $data);  break;
                        case 'how-many-goals': $status = $this->how_many_goals($game, $data);  break;
                        case 'correct-score': $status = $this->correct_score($game, $data);  break;
                        case 'goals': $status = $this->goals($game, $data);  break;
                        default:
                            # code...
                            break;
                    }
                    /*if (
                            $game->game_type == 'match'
                            || $game->game_type == 'handicap'
                            || $game->game_type == 'half-time'
                        ) {
                        $status = $this->x12Sport($game, $data);
                    } else if ($game->game_type == 'double-chance') {
                        //Kodo tuka
                    }*/
                }
            }
            
            return $status;
        }
        
        /**
         * For all similar games
         * @param type $game
         * @param type $data json
         * @return boolean win or not
         */
        public function x12Sport($game, $data)
        {
            $status = 0;
            
            if ($game->type == '1') {
                $status = 2;//Setting as losed, but will be changed in if
                if ($data->score->team1 > $data->score->team2) {
                    $status = 1;
                }
            } else if ($game->type == 'X') {
                $status = 2;
                if ($data->score->team1 == $data->score->team2) {
                    $status = 1;
                }
            } else if ($game->type == '2') {
                $status = 2;
                if ($data->score->team1 < $data->score->team2) {
                    $status = 1;
                }
            }
            
            return $status;
        }

        public function handicap($game, $data)
        {
            $status = 0;
            switch ($game->type) {
                case '1': ($data->score->team1 > $data->score->team2+1) ? $status = 1 : $status = 0 ; break;
                case 'X': ($data->score->team1 = $data->score->team2+1) ? $status = 1 : $status = 0 ; break;
                case '2': ($data->score->team1 < $data->score->team2+1) ? $status = 1 : $status = 0 ; break;
                
                default: $status = 2; break;
            }

            return $status;
        }

        public function double_chance($game, $data)
        {
            $status = 0;
            if ($game->type == '1x') {
                $status = 2;//Setting as losed, but will be changed in if
                if ($data->score->team1 >= $data->score->team2) {
                    $status = 1;
                }
            }

            return $status;
        }

        public function how_many_goals($game, $data)
        {
            $status = 2;

            switch ($game->type) {
                case '0': ($data->score->team1 == 0 AND $data->score->team2 == 0) ? $status = 1 : $status = 0; break;
                case '1+': (($data->score->team1 + $data->score->team2) >= 1) ? $status = 1 : $status = 0; break;
                case '0-1': (($data->score->team1 + $data->score->team2) <= 1) ? $status = 1 : $status = 0; break;
                case '2+': (($data->score->team1 + $data->score->team2) >= 2) ? $status = 1 : $status = 0; break;
                case '0-2': (($data->score->team1 + $data->score->team2) <= 2) ? $status = 1 : $status = 0; break;
                case '3+': (($data->score->team1 + $data->score->team2) >= 3) ? $status = 1 : $status = 0; break;
                case '0-3': (($data->score->team1 + $data->score->team2) <= 3) ? $status = 1 : $status = 0; break;
                case '4+': (($data->score->team1 + $data->score->team2) >= 4) ? $status = 1 : $status = 0; break;
                case '0-4': (($data->score->team1 + $data->score->team2) <= 4) ? $status = 1 : $status = 0; break;
                case '5+': (($data->score->team1 + $data->score->team2) >= 5) ? $status = 1 : $status = 0; break;
                
                default: $status = 2; break;
            }

            return $status;
        }

        public function correct_score($game, $data)
        {
            $status = 0;

            $exp = explode(':', $game->type);
            
            ($exp[0] === $data->score->team1 AND $exp[1] === $data->score->team2) ? $status = 1 : $status = 2;

            return $status;
        }

        public function goals($game, $data)
        {
            $status = 0;

            ((int)$game->type === ((int)$data->score->team1 + (int)$data->score->team2)) ? $status = 1 : $status = 2;

            return $status;
        }

        /**
         * Getting xml and everything is copied into database. If already match is saved, then field data is updated
         */
        public function actionGetxml()
        {
            $u_id = Yii::app()->user->id;
            $isAdmin = array_key_exists($u_id, $this->admin);

            if (($_SERVER['SERVER_ADDR'] == $_SERVER['REMOTE_ADDR']) || $isAdmin) {
            
                $xml = simplexml_load_file('http://api.oddsleaders.dev/xml/odds.xml');
                foreach ($xml->sport as $key => $sport) {

                    $sportModel = Sport::model()->findByAttributes(array('name'=>(string)$sport->sport_name));

                    if (!$sportModel) {
                        $sportModel = new Sport();
                        $sportModel->name = (string)$sport->sport_name;
                        $sportModel->active = 1;
                        $sportModel->save();
                    }

                    foreach ($sport->tournament as $key => $tournament) {
                        $countryModel = Country::model()->findByAttributes(array('country'=>(string)$tournament->country));

                        if (!$countryModel) {
                            $countryModel = new Country();
                            $countryModel->country = (string)$tournament->country;
                            $countryModel->link = 'http://oddsleaders.com';
                            $countryModel->save();
                        }

                        $tournamentModel = Tournament::model()->findByAttributes(array('name'=>(string)$tournament->tournament_name));

                        if (!$tournamentModel) {
                            $tournamentModel = new Tournament();
                            $tournamentModel->name = (string)$tournament->tournament_name;
                            $tournamentModel->slug = SlugGenerator::slug((string)$tournament->tournament_name);
                            $tournamentModel->active = 1;
                            $tournamentModel->sport_id = $sportModel->id;
                            $tournamentModel->country_id = $countryModel->id;
                            $tournamentModel->save();
                        }

                        foreach ($tournament->game as $key => $game) {
                            $stackModel = Stack::model()->findByAttributes(array('code'=>(string)$game->code));

                            if (!$stackModel) {
                                if ((string)$game->opponent) {
                                    $stackModel = new Stack();
                                    $stackModel->code = (string)$game->code;
                                    $stackModel->opponent = (string)$game->opponent;
                                    $stackModel->start = (string)$game->start;
                                    $stackModel->data = (string)$game->odds;
                                    $stackModel->tournament_id = $tournamentModel->id;
                                    $stackModel->active = 1;
                                    $stackModel->bet_count = 0;
                                    $stackModel->save();
                                }
                            } else {
                                $stackModel->data = (string)$game->odds;
                                $stackModel->update();
                            }
                        }
                    }
                }
                
            } else {
                die('Access forbidden!');
            }
            
            exit();
        }
        
        public function actionTest()
        {
            $server = 'http://api.oddsleaders.dev';
            
            $code = '192949235';//Set code you like
            $url = Yii::app()->createUrl('cron/getinfo', array('code'=>$code));
            
            //Make request
            $parserAll = new SimpleHTMLDOM;
            $htmlAll = $parserAll->file_get_html($server.$url);
            $returnedValue = $htmlAll->innertext;//Decode this value with json_decode
            
            echo $returnedValue;
//            var_dump(json_decode($returnedValue));
//            echo $htmlAll->innertext;
            exit();
        }

}