<?php

class BetController extends Controller
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
			'postOnly + delete', // we only allow deletion via POST request
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','betmanager','slipper'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
            $this->layout='admin';
            
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
            $this->layout='admin';
            
		$model=new Bet;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Bet']))
		{
			$model->attributes=$_POST['Bet'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
            $this->layout='admin';
            
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Bet']))
		{
			$model->attributes=$_POST['Bet'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Bet');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
            $this->layout='admin';
            
            $model=new Bet('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Bet']))
                $model->attributes=$_GET['Bet'];

            $this->render('admin',array(
                'model'=>$model,
            ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Bet the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Bet::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Bet $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='bet-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        
        public function actionBetmanager()
        {
            $model = User::model()->findAll();
            
            $this->render('betmanager',array(
                'model'=>$model,
            ));
        }
        
        public function actionSlipper()
        {
            $model = User::model()->findAll();
            
            if (isset($_POST) && !empty($_POST)) {
                if(isset($_COOKIE['myBets']) AND $_COOKIE['myBets'] != '')
        	{
                    $user = User::model()->findByPk(Yii::app()->user->id);
                    $conto = $user->conto;
                    if ($_POST['stake'] <= $conto) {
                        $games = explode('|', $_COOKIE['myBets']);

                        $totalOdds = 1;
                        foreach ($games as $key => $value) {
                            if ($value != '') {
                                $gameArray = explode('=', $value);
                                if ($gameArray[0] != '') {
                                    $totalOdds *= OddsClass::formatNumber($gameArray[2]);
                                }
                            }
                        }

                        $ticket = new Ticket();
                        $ticket->odd = $totalOdds;
                        $ticket->deposit = $_POST['stake'];
                        $ticket->earning = $totalOdds * $_POST['stake'];
                        $ticket->status = 0;
                        $ticket->user_id = Yii::app()->user->id;
                        $ticketSaved = $ticket->save();
                        
                        $user->conto -= $_POST['stake'];
                        $user->update();
                        
                        if ($ticketSaved) {
                            foreach ($games as $key => $value) {
                                if ($value != '') {
                                    $gameArray = explode('=', $value);
                                    if ($gameArray[0] != '') {
                                        $stack = Stack::model()->findByAttributes(array('code'=>$gameArray[0]));

                                        $game = new Game();
                                        $game->code = $gameArray[0];
                                        $game->game_type = $gameArray[4];
                                        $game->type = $gameArray[1];
                                        $game->odd = OddsClass::formatNumber($gameArray[2]);
                                        $game->ticket_id = $ticket->id;
                                        $game->stack_id = $stack->id;
                                        $gameSaved = $game->save();
                                        
                                        if ($gameSaved) {
                                            $stack->bet_count += 1;
                                            $stack->update();
                                        }
                                    }
                                }
                            }
                        }
                        setcookie('myBets', '', time()-3600);
                        Yii::app()->user->setFlash('new_error', "Your bet is recored.");
                        $this->redirect(Yii::app()->createUrl("bet/slipper"));
                    } else {
                        Yii::app()->user->setFlash('new_error', "Insufficient money.");
                        $this->redirect(Yii::app()->createUrl("bet/slipper"));
                    }
        	}
            }
            
            $this->render('slipper',array(
                'model'=>$model,
            ));
        }
}
