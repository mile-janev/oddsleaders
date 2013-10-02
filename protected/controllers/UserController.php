<?php

class UserController extends Controller
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
				'actions'=>array('index','view','register'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=> UserRoleCheck::admin_users(),
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
		$model=new User;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
        
        public function actionRegister()
	{
		$model=new User;
                $model->oauth_provider = isset($_GET['registerwith']) ? $_GET['registerwith'] : "ordinary";
                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
                        $_POST['User']['role'] = Role::FREE_USER;
			$postParams = $_POST['User'];
                        
			if($model->saveUser($postParams))
                        {                             
                            $this->redirect(array('view','id'=>$model->id));
                        }
		}
                
//                Facebook registration start
                require dirname(Yii::app()->basePath) . '/lib/facebook-php-sdk/src/facebook.php';
                
                $facebook = new Facebook(array(
                    'appId' => '1454745711416645',
                    'secret' => '4b531490370c935cc2079ba8ea78b7e0',
                    'cookie' => true,
                ));
                
                if(isset($_GET['registerwith']) && $_GET['registerwith'] == 'facebook'){
                    $fb_user = $facebook->getUser();
                    // we check if there is a user logged in
                    if ($fb_user) {
                        try {
                            $user_info = $facebook->api('/'.$fb_user);                
                        } catch (Exception $exc) {
                            echo $exc->getMessage();
                        }
                        
                        if($user_info){
                            $model->name = $user_info['first_name']." ".$user_info['last_name'];
                            $model->username = $user_info['username'];
                            $model->email = $user_info['email'];
                            $model->oauth_provider = "facebook";
                            $access_token = $facebook->getAccessToken();
                            $model->oauth_uid = $fb_user;   //Ova e ID na userot
                            Yii::app()->user->name = $model->username;

                            $user = User::model()->findByAttributes(array('username'=>$model->username));

                            if(!isset($user))
                            {
                                if(isset($_POST['User']))
                                {
                                    $_POST['User']['role'] = Role::FREE_USER;
                                    $postParams = $_POST['User'];
                                    if($model->saveUser($postParams))
                                    {                             
                                        $this->redirect(Yii::app()->createUrl("site/login"));
                                    }
                                }
                            }
                            else if(isset($user) && $user->oauth_provider != 'facebook')
                            {
                                User::model()->updateByPk($user->id, array('password'=>NULL,'oauth_provider'=>'facebook', 'oauth_uid'=>$model->oauth_uid));
                            }
                            
                                Yii::app()->session['login_way'] = 'facebook'; //If user is authenticated via facebook we set this session to check later in UserIdentity class
                                if($model->validate() && $model->login())
                                {
                                    if(isset(Yii::app()->session['model']))
                                    {
                                         $this->redirect(Yii::app()->createUrl("site/index"));
                                    }
                                    else
                                    {
                                        $this->redirect(Yii::app()->user->returnUrl);
                                    }
                                }
        //				$this->redirect(Yii::app()->user->returnUrl);
                        }
                    }
                }
//                Facebook registration end

		$this->render('register',array(
			'model'=>$model,
                        'facebook' => $facebook
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['User']))
		{
			$model->attributes=$_POST['User'];
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
		$dataProvider=new CActiveDataProvider('User');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new User('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['User']))
			$model->attributes=$_GET['User'];
                
		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return User the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Users $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='users-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
