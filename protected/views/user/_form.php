<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form popup">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
        'action'=>array('user/register'),
        'clientOptions'=>array(
            'validateOnSubmit'=>true,
        ),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

        <?php echo $form->hiddenField($model, 'oauth_provider'); ?>
        <?php echo $form->hiddenField($model, 'oauth_uid'); ?>

	<div class="row">
		<i class="icon-user"></i>
		<?php echo $form->textField($model,'username', array("Placeholder"=>"Username")); ?>
	</div>

	<div class="row">
		<i class="icon-lock"></i>
		<?php echo $form->passwordField($model,'password', array("Placeholder"=>"Password")); ?>
	</div>
        
        <div class="row">
		<i class="icon-repeat"></i>
		<?php echo $form->passwordField($model,'password_repeat', array("Placeholder"=>"Repeat password")); ?>
	</div>    
        <div class="row">
		<i class="icon-envelope"></i>
		<?php echo $form->textField($model,'email', array("Placeholder"=>"Email")); ?>
	</div>

	<div class="row">
		<i class="icon-pencil"></i>
		<?php echo $form->textField($model,'name', array("Placeholder"=>"Your name")); ?>
	</div>	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create my profile' : 'Save changes', array('class'=>"button green")); ?>
	</div>

<?php $this->endWidget(); ?>

        <div class="facebook_login"><a href="<?php echo htmlspecialchars($facebook->getLoginUrl(array('scope' => 'user_website,user_birthday,email', 'redirect_uri' => Yii::app()->createAbsoluteUrl("user/register", array('registerwith' => 'facebook'), '', '&')))); ?>" class="button green"><i class="icon-facebook"></i>  Register using Facebook</a></div>
        <hr>
        <p>You already have account ???</p>
        <?php echo CHtml::link('<i class="icon-user"></i> Log In', '#partial-login', array('id'=>'loginColorboxInside', 'class'=>'fb_login button blue')); ?>

</div><!-- form -->