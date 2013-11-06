<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
            $script = Yii::app()->clientScript;
            $baseUrl = Yii::app()->request->baseUrl;
            $script->registerScriptFile($baseUrl . '/js/main.js');
            $script->registerCssFile($baseUrl . '/lib/colorbox/colorbox.css');
            $script->registerScriptFile($baseUrl . '/lib/colorbox/jquery.colorbox-min.js');
            $script->registerScriptFile($baseUrl . '/js/nanoScroller.js');
            
//            Login
            $login=new LoginForm;
            require dirname(Yii::app()->basePath) . '/lib/facebook-php-sdk/src/facebook.php';
            $facebook = new Facebook(array(
                'appId' => '1454745711416645',
                'secret' => '4b531490370c935cc2079ba8ea78b7e0',
                'cookie' => true,
            ));
//            Register
            $model=new User;
            

            $this->render('index', array(
                'login'=>$login,
                'model'=>$model,
                'facebook' => $facebook
            ));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
                
//                Facebook login start
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
                
                            $user = User::model()->findByAttributes(array('username'=>$user_info['username']));
                            if($user)
                            {
                                $model->username = $user->username;
                                $model->password = $user->password;
                                
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
                            }
                            else
                            {
                                echo "Please register first";
                            }
                            
                        }
                    }
                }
//                Facebook registration end
                
		// display the login form
		$this->render('login',array(
                    'model'=>$model,
                    'facebook' => $facebook,
                ));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}