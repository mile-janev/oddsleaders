<?php

class GetMatchesController extends Controller
{
	public function actionIndex()
	{
		$id = 0;
		if(isset($_POST['id']))
				$id = $_POST['id'];

		$matches = Stack::model()->findAll(array(
			'condition' => 'tournament_id > :id',
			'params' => array(':id' => $id),
		));

		$this->render('index', array(
			'matches' => $matches,
		));
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}