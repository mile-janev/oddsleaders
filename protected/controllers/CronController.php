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
				'actions'=>array('cron','calculatewin','getxml'),
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
                    if ($game->game_type == 'match') {
                        $status = $this->x12Sport($game, $data);
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

}