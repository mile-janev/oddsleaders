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
            foreach ($sport->tournament as $key => $tournament) {
                $tournament_name = (string)$tournament->tournament_name;
                foreach ($tournament->game as $key => $game) {
                	$odds = (string)$game->odds;
                }
            }
        }
    }
}