<?php

class StackController extends Controller
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
				'actions'=>array('index','view','topmatches','getmatches','myleagues', 'mymatches', 'myslipper'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','admintopmatches'),
				'users'=>UserRoleCheck::admin_users(),
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
            
		$model=new Stack;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Stack']))
		{
			$model->attributes=$_POST['Stack'];
                        
                        $tournament = Tournament::model()->findByPk($_POST['Stack']['tournament_id']);
                        $model->start = strtotime($_POST['Stack']['start']);
                        $model->code = OddsClass::codeGenerator($tournament);
                        $model->active = 1;
                        $model->data = json_encode(json_decode($model->data)); //This is maked because pretty_print destroy string in area
                        
                        $tournament = $_POST['Stack']['tournament_id'];
                        
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
                
                $allTournaments = Tournament::model()->findAll();
		$this->render('create',array(
			'model'=>$model,
                        'allTournaments'=>$allTournaments
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

		if(isset($_POST['Stack']))
		{
			$model->attributes=$_POST['Stack'];
                        $model->data = json_encode(json_decode($model->data)); //This is maked because pretty_print destroy string in area
                        $model->start = strtotime($_POST['Stack']['start']);
                        
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}
                
                $model->data = Oddsleaders::pretty_print($model->data);
                $allTournaments = Tournament::model()->findAll();
                
		$this->render('update',array(
			'model'=>$model,
                        'allTournaments'=>$allTournaments
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
		$dataProvider=new CActiveDataProvider('Stack');
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
            
            $model=new Stack('search');
            $model->unsetAttributes();  // clear any default values
            if(isset($_GET['Stack']))
                $model->attributes=$_GET['Stack'];

            $this->render('admin',array(
                'model'=>$model,
            ));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Stack the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Stack::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Stack $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='stack-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        public function actionTopmatches()
        {
            $model = Stack::model()->findAll();
            
            $this->render('topmatches',array(
                'model'=>$model,
            ));
        }
        
        public function actionAdmintopmatches()
        {
            $this->layout='admin';
            
            $model = Stack::model()->findAll();
            
            $this->render('admintopmatches',array(
                'model'=>$model,
            ));
        }
        
        public function actionGetmatches() 
        {
            $id = $_POST['id'];
            
            $criteria1 = new CDbCriteria();
            $criteria1->addCondition('start > :nowtime');
            $criteria1->params[':nowtime'] = time();
            $criteria1->addCondition('tournament_id = :id');
            $criteria1->params[':id'] = $id;
            $matches = Stack::model()->findAll($criteria1);
            
            $content = $this->renderPartial('getmatches', array('matches' => $matches));

            Yii::app()->end();
        }

        public function actionMyleagues()
        {
        	if(isset($_COOKIE['myLeagues']) AND $_COOKIE['myLeagues'] != '')
        	{
	        	$leagues = explode('|', $_COOKIE['myLeagues']);
	        	foreach ($leagues as $key => $value) {
	        		if($value != '')
	        		{
                                    $criteria1 = new CDbCriteria();
			            $criteria1->addCondition('tournament_id = :id');
			            $criteria1->params[':id'] = $value;	
			            $model[] = Stack::model()->findAll($criteria1);
	        		}
	        	}
        	}
        	else
        	{
        		$model = '';
        	}

        	$this->render('myleagues',array(
                'model'=>$model,
            ));
        }
        
        public function actionMymatches()
        {
            $model = new Stack();

            $this->render('mymatches',array(
                'model'=>$model,
            ));
        }
        
        public function actionMyslipper()
        {
            $model = new Stack();

            $this->render('myslipper',array(
                'model'=>$model,
            ));
        }
}
