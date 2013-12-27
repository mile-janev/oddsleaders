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
				'actions'=>array('cron','calculatewin','getxml','newmonth','test'),
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
            $u_id = Yii::app()->user->id;
            $isAdmin = array_key_exists($u_id, $this->admin);
            
            if (($_SERVER['SERVER_ADDR'] == $_SERVER['REMOTE_ADDR']) || $isAdmin) {
                
                $time = date("H:i",time());
                $dayMonth = date("d-m", time());
                
                if ( $time=='00:00' || $time=='02:00' || $time=='04:00' || $time=='06:00' || $time=='08:00' || $time=='10:00'
                    || $time=='12:00' || $time=='14:00' || $time=='16:00' || $time=='18:00' || $time=='20:00' || $time=='22:00'
                ) {
                    $this->actionGetxml();
                }
                else if ($time=='00:00')
                {
                    $this->actionCalculatewin();
                }
                else if (($dayMonth=='31.01' && $time=='23:59') || ($dayMonth=='28.02' && $time=='23:59') || ($dayMonth=='31.03' && $time=='23:59') || ($dayMonth=='30.04' && $time=='23:59') 
                        || ($dayMonth=='31.05' && $time=='23:59') || ($dayMonth=='30.06' && $time=='23:59') || ($dayMonth=='31.07' && $time=='23:59') || ($dayMonth=='31.08' && $time=='23:59')
                        || ($dayMonth=='30.09' && $time=='23:59') || ($dayMonth=='31.10' && $time=='23:59') || ($dayMonth=='30.11' && $time=='23:59') || ($dayMonth=='31.12' && $time=='23:59')
                ) {
                    $this->actionNewmonth();
                }
            
            } else {
                die('Access forbidden!');
            }
            
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
                        if ($status == 0) 
                        {
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
                    if ($tickedWinned==1) {
                        $user = User::model()->findByPk($ticket->user_id);
                        $user->conto += $ticket->earning;
                        $user->conto_all += $ticket->earning;
                        $user->update();
                    }
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
            $result = json_decode($game->stack->result,true);

            if (isset($result) AND $result != '') { //If isset then game is finished.
                if ($game->stack->tournament->sport->name == 'Football') {
                    switch ($game->game_type) {
                        case 'match': $status = $this->x12Sport($game, $result);  break;
                        case 'handicap': $status = $this->handicap($game, $result);  break;
                        case 'half-time': $status = $this->half_time($game, $result);  break;
                        case 'first-goal': $status = $this->first_goal($game, $result);  break;
                        case 'double-chance': $status = $this->double_chance($game, $result);  break;
                        case 'how-many-goals': $status = $this->how_many_goals($game, $result);  break;
                        case 'correct-score': $status = $this->correct_score($game, $result);  break;
                        case 'goals': $status = $this->goals($game, $result);  break;
                        case 'time-first-goal': $status = $this->time_goal($game, $result);  break;
                        case 'half-full-time': $status = $this->half_full_time($game, $result);  break;
                        case 'when-first-goal': $status = $this->time_goal($game, $result);  break;
                        case 'time-first-goal': $status = $this->time_goal($game, $result);  break;
                        default:
                            $status = 0;
                        break;
                    }
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
                if ($data['final']['team1'] > $data['final']['team2']) {
                    $status = 1;
                }
            } else if ($game->type == 'X') {
                $status = 2;
                if ($data['final']['team1'] == $data['final']['team2']) {
                    $status = 1;
                }
            } else if ($game->type == '2') {
                $status = 2;
                if ($data['final']['team1'] < $data['final']['team2']) {
                    $status = 1;
                }
            }
            
            return $status;
        }

        public function half_time($game, $data)
        {
            $status = 0;
            
            if ($game->type == '1') {
                $status = 2;//Setting as losed, but will be changed in if
                if ($data['half-time']['team1'] > $data['half-time']['team2']) {
                    $status = 1;
                }
            } else if ($game->type == 'X') {
                $status = 2;
                if ($data['half-time']['team1'] == $data['half-time']['team2']) {
                    $status = 1;
                }
            } else if ($game->type == '2') {
                $status = 2;
                if ($data['half-time']['team1'] < $data['half-time']['team2']) {
                    $status = 1;
                }
            }
            
            return $status;
        }

        public function handicap($game, $data)
        {
            $status = 0;
            switch ($game->type) {
                case '1': ($data['final']['team1'] > $data['final']['team2']+1) ? $status = 1 : $status = 2 ; break;
                case 'X': ($data['final']['team1'] == $data['final']['team2']+1) ? $status = 1 : $status = 2 ; break;
                case '2': ($data['final']['team1'] < $data['final']['team2']+1) ? $status = 1 : $status = 2 ; break;
                
                default: $status = 2; break;
            }

            return $status;
        }

        public function first_goal($game, $data)
        {
            $status = 0;
            
            if ($game->type == 'Home') {
                $status = 2;//Setting as losed, but will be changed in if
                if (min($data['goals']['team1']) < min($data['goals']['team2'])) {
                    $status = 1;
                }
            } else {
                $status = 2;
                if (min($data['goals']['team1']) > min($data['goals']['team2'])) {
                    $status = 1;
                }
            }
            
            return $status;
        }

        public function double_chance($game, $data)
        {
            $status = 0;

            if ($game->type == '1x') {
                $status = 2;//Setting as losed, but will be changed in if
                if ($data['final']['team1'] >= $data['final']['team2']) {
                    $status = 1;
                }
            }
            else 
            {
                $status = 2;
                if ($data['final']['team1'] <= $data['final']['team2']) {
                    $status = 1;
                }
            }

            return $status;
        }

        public function how_many_goals($game, $data)
        {
            $status = 0;

            switch ($game->type) {
                case '0': ($data['final']['team1'] == 0 AND $data['final']['team2'] == 0) ? $status = 1 : $status = 2; break;
                case '1+': (($data['final']['team1'] + $data['final']['team2']) >= 1) ? $status = 1 : $status = 2; break;
                case '0-1': (($data['final']['team1'] + $data['final']['team2']) <= 1) ? $status = 1 : $status = 2; break;
                case '2+': (($data['final']['team1'] + $data['final']['team2']) >= 2) ? $status = 1 : $status = 2; break;
                case '0-2': (($data['final']['team1'] + $data['final']['team2']) <= 2) ? $status = 1 : $status = 2; break;
                case '3+': (($data['final']['team1'] + $data['final']['team2']) >= 3) ? $status = 1 : $status = 2; break;
                case '0-3': (($data['final']['team1'] + $data['final']['team2']) <= 3) ? $status = 1 : $status = 2; break;
                case '4+': (($data['final']['team1'] + $data['final']['team2']) >= 4) ? $status = 1 : $status = 2; break;
                case '0-4': (($data['final']['team1'] + $data['final']['team2']) <= 4) ? $status = 1 : $status = 2; break;
                case '5+': (($data['final']['team1'] + $data['final']['team2']) >= 5) ? $status = 1 : $status = 2; break;
                
                default: $status = 0; break;
            }

            return $status;
        }

        public function correct_score($game, $data)
        {
            $status = 0;

            $exp = explode(':', $game->type);
            
            ($exp[0] === $data['final']['team1'] AND $exp[1] === $data['final']['team2']) ? $status = 1 : $status = 2;

            return $status;
        }

        public function goals($game, $data)
        {
            $status = 0;

            ((int)$game->type === ((int)$data['final']['team1'] + (int)$data['final']['team2'])) ? $status = 1 : $status = 2;

            return $status;
        }

        public function time_goal($game, $data)
        {
            $status = 0;
            $home_goal = min($data['goals']['team1']);
            $guest_goal = min($data['goals']['team2']);

            ($home_goal < $guest_goal) ? $first_goal = $home_goal : $first_goal = $guest_goal;

            switch ($game->type) {
                case '1-29':  ($first_goal >= '1' AND $first_goal <= '29') ? $status = 1 : $status = 2; break;
                case '30+':   ($first_goal >= '30') ? $status = 1 : $status = 2; break;
                case '1-10':  ($first_goal >= '1' AND $first_goal <= '10') ? $status = 1 : $status = 2; break;
                case '11-20': ($first_goal >= '11' AND $first_goal <= '20') ? $status = 1 : $status = 2; break;
                case '21-30': ($first_goal >= '21' AND $first_goal <= '30') ? $status = 1 : $status = 2; break;
                case '31-40': ($first_goal >= '31' AND $first_goal <= '40') ? $status = 1 : $status = 2; break;
                case '41-50': ($first_goal >= '41' AND $first_goal <= '50') ? $status = 1 : $status = 2; break;
                case '51-60': ($first_goal >= '51' AND $first_goal <= '60') ? $status = 1 : $status = 2; break;
                case '61-70': ($first_goal >= '61' AND $first_goal <= '70') ? $status = 1 : $status = 2; break;
                case '71-80': ($first_goal >= '71' AND $first_goal <= '80') ? $status = 1 : $status = 2; break;
                case '81+':   ($first_goal >= '81') ? $status = 1 : $status = 2; break;
                
                default: $status = 0; break;
            }

           return $status;
        }

        public function half_full_time($game, $data)
        {
            $status = 0;

            switch ($game->type) {
                case 'H/H': (($data['half-time']['team1'] > $data['half-time']['team2']) AND ($data['final']['team1'] > $data['final']['team2'])) ? $status = 1 : $status = 2; break;
                case 'X/H': (($data['half-time']['team1'] == $data['half-time']['team2']) AND ($data['final']['team1'] > $data['final']['team2'])) ? $status = 1 : $status = 2; break;
                case 'G/H': (($data['half-time']['team1'] < $data['half-time']['team2']) AND ($data['final']['team1'] > $data['final']['team2'])) ? $status = 1 : $status = 2; break;
                case 'H/X': (($data['half-time']['team1'] > $data['half-time']['team2']) AND ($data['final']['team1'] == $data['final']['team2'])) ? $status = 1 : $status = 2; break;
                case 'X/X': (($data['half-time']['team1'] == $data['half-time']['team2']) AND ($data['final']['team1'] == $data['final']['team2'])) ? $status = 1 : $status = 2; break;
                case 'G/X': (($data['half-time']['team1'] < $data['half-time']['team2']) AND ($data['final']['team1'] == $data['final']['team2'])) ? $status = 1 : $status = 2; break;
                case 'H/G': (($data['half-time']['team1'] > $data['half-time']['team2']) AND ($data['final']['team1'] < $data['final']['team2'])) ? $status = 1 : $status = 2; break;
                case 'X/G': (($data['half-time']['team1'] == $data['half-time']['team2']) AND ($data['final']['team1'] < $data['final']['team2'])) ? $status = 1 : $status = 2; break;
                case 'G/G': (($data['half-time']['team1'] < $data['half-time']['team2']) AND ($data['final']['team1'] < $data['final']['team2'])) ? $status = 1 : $status = 2; break;
                
                default: $status = 0; break;
            }
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
            
                $xml = simplexml_load_file('http://api.oddsleaders.com/xml/odds.xml');
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
        
        /**
         * Cron for every month save conto for current month and reset for new
         */
        public function actionNewmonth()
        {
            $u_id = Yii::app()->user->id;
            $isAdmin = array_key_exists($u_id, $this->admin);

            if (($_SERVER['SERVER_ADDR'] == $_SERVER['REMOTE_ADDR']) || $isAdmin) {
                
                $users = User::model()->findAll();
                foreach ($users as $user) {
                    $history = new History();
                    $history->user_id = $user->id;
                    $history->month = date("d-m-Y",time());
                    $history->conto = $user->conto;
                    $history->position;
                    $history->save();

                    $user->conto = 500;
                    $user->update();
                }
                
                $criteria1 = new CDbCriteria();
                $criteria1->addCondition('month = :month');
                $criteria1->params[':month'] = date("d-m-Y",time());
                $criteria1->order = 'conto DESC';
                $histories = History::model()->findAll($criteria1);
                
                $j=1;
                for ($i=0; $i<count($histories); $i++) {
                    $histories[$i]->position = $j;
                    $histories[$i]->update();
                    $j++;
                }
            
            } else {
                die('Access forbidden!');
            }
            
            exit();
        }
        
        public function actionTest()
        {
            $server = 'http://api.oddsleaders.dev';
            
            $code = '1142563436';//Set code you like
            $url = Yii::app()->createUrl('cron/forceodds', array('code'=>$code));
//            var_dump($url);
//            exit();
            //Make request
            $parserAll = new SimpleHTMLDOM;
            $htmlAll = $parserAll->file_get_html($server.$url);
            $returnedValue = $htmlAll->innertext;//Decode this value with json_decode
            
//            echo $returnedValue;
            var_dump(json_decode($returnedValue));
//            echo $htmlAll->innertext;
            exit();
        }

}