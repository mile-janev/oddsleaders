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
				'actions'=>array('getxml','getlinks', 'linkdata'),//
				'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
    
    public function actionGetXml()
    {
        $xml = simplexml_load_file('http://api.oddsleaders.dev/xml/odds.xml');
        foreach ($xml->sport as $key => $sport) {
            $sport_name = (string)$sport->sport_name;

        	$sport_model = new Sport();
            $sport_model->name = $sport_name;
            $sport_model->save();

            $sport_id = Yii::app()->db->getLastInsertId('Sport');
            
            foreach ($sport->tournament as $key => $tournament) {
                $tournament_name = (string)$tournament->tournament_name;
                $tournament_slug = SlugGenerator::slug($tournament_name);

            	$league_model = new League();
                $league_model->name = $tournament_name;
                $league_model->slug = $tournament_slug;
                $league_model->sport_id = $sport_id;
                $league_model->save();             

            	$league_id = Yii::app()->db->getLastInsertId('League');

                foreach ($tournament->game as $key => $game) {
                	$code = (string)$game->code;
                	$opponent = (string)$game->opponent;
                	$start = (string)$game->start;
                	$odds = (string)$game->odds;
                		
                	$game_model = new Game();
	                $game_model->teams = $opponent;
	                $game_model->start = strtotime($start);
	                $game_model->odds = $odds;
	                $game_model->league_id = $league_id;
	                $game_model->code = $code;
	                $game_model->save();
                }
            }
        }
    }
}