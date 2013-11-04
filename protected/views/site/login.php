<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<h1>Login</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableAjaxValidation'=>true,
        'action'=>array('site/login'),
	'clientOptions'=>array(
            'validateOnSubmit'=>true,
	),
)); ?>
	<img src="http://www.topvideo.tv/images/regtop.png"/>
	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'password'); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>

<?php $this->endWidget(); ?>
        
<div class="facebook_login"><a href="<?php echo htmlspecialchars($facebook->getLoginUrl(array('scope' => 'user_website,user_birthday,email', 'redirect_uri' => Yii::app()->createAbsoluteUrl('site/login', array('registerwith' => 'facebook'), '', '&')))); ?>" >Login using Facebook</a></div>
        
<?php echo CHtml::link('Register here', '#partial-register', array('id'=>'registerColorboxInside')); ?>

</div><!-- form -->
