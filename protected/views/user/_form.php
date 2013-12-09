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
        <?php echo $form->hiddenField($model, 'oauth_provider'); ?>
        <?php echo $form->hiddenField($model, 'oauth_uid'); ?>

	<div class="row">
		<i class="icon-user"></i>
		<?php echo $form->textField($model,'username', array("Placeholder"=>"Username")); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<i class="icon-lock"></i>
		<?php echo $form->passwordField($model,'password', array("Placeholder"=>"Password")); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
        
        <div class="row">
		<i class="icon-repeat"></i>
		<?php echo $form->passwordField($model,'password_repeat', array("Placeholder"=>"Repeat password")); ?>
		<?php echo $form->error($model,'password_repeat'); ?>
	</div>    
        <div class="row">
		<i class="icon-envelope"></i>
		<?php echo $form->textField($model,'email', array("Placeholder"=>"Email")); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<i class="icon-pencil"></i>
		<?php echo $form->textField($model,'name', array("Placeholder"=>"Your name")); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>	

	<div class="row">
		<div id="mybutton" class="button grey"> Add Avatar
			<?php echo $form->fileField($model,'file', array('id'=>'avatar', 'onchange' => "readURL(this);")); ?>
		</div><br>
		<?php echo $form->hiddenField($model,'image'); ?>
		<img src="<?php echo $model->image;?>" id="img"/>
	</div>	

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create my profile' : 'Save changes', array('class'=>"button green")); ?>
	</div>

<?php $this->endWidget(); ?>

        <div class="facebook_login"><a href="<?php echo htmlspecialchars($facebook->getLoginUrl(array('scope' => 'email', 'redirect_uri' => Yii::app()->createAbsoluteUrl("user/register", array('registerwith' => 'facebook'), '', '&')))); ?>" class="button green"><i class="icon-facebook"></i>  Register using Facebook</a></div>
        <hr>
        <p>You already have account ???</p>
        <a id="loginColorboxInside" href="<?php echo (Yii::app()->controller->id.'/'.$this->action->id == 'site/index') ? "#partial-login" : Yii::app()->createUrl('site/login'); ?>" class="fb_login button blue"><i class="icon-signin"></i> Log in</a>

</div><!-- form -->
<script type="text/javascript">
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#img')
                    .attr('src', e.target.result)
                    .width(100)
                    .height(100);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>