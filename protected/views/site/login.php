<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>
<div class="form popup">
	<div id="left">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableAjaxValidation'=>true,
		        'action'=>array('site/login'),
			'clientOptions'=>array(
		            'validateOnSubmit'=>true,
			),
		)); ?>
		<img src="/images/regtop.png"/>
		<div class="row">
			<i class="icon-user"></i>
			<?php echo $form->textField($model,'username', array('placeholder'=>'Username')); ?>
		</div>

		<div class="row">
			<i class="icon-lock"></i>
			<?php echo $form->passwordField($model,'password', array('placeholder'=> 'Password')); ?>
		</div>

		<div class="row rememberMe">
			<section> 
				<div class="squaredFour">	
				<?php echo $form->checkBox($model,'rememberMe', array('id'=>'squaredFour')); ?>
	  			<label for="squaredFour"></label>
	  			</div>
			</section>
				<?php echo $form->label($model,'rememberMe'); ?>
		</div>
		<button type="submit" class="button blue"><i class="icon-signin"></i> Log me in</button>
		<div id="error">
			<?php echo $form->error($model,'username'); ?>
			<?php echo $form->error($model,'password'); ?>
		</div>
		<?php $this->endWidget(); ?>
		<hr>
		<div class="facebook_login"><a href="<?php echo htmlspecialchars($facebook->getLoginUrl(array('scope' => 'user_website,user_birthday,email', 'redirect_uri' => Yii::app()->createAbsoluteUrl('site/login', array('registerwith' => 'facebook'), '', '&')))); ?>" class="button blue"><i class="icon-facebook facebook"></i> Log in using facebook</a></div>
	</div>
	<div id="right">
		<h1>New Here ???</h1>
		<p>Step into the virtual world of sports gambling. Show you are the best predictor and win a lot of prizes and respect. We offer you the best odds and many games you can play in different sports. So REGISTER NOW and get 500 OMoney. </p>
		<?php echo CHtml::link('<i class="icon-user"></i> Register here', '#partial-register', array('id'=>'registerColorboxInside', 'class'=>'button green')); ?>
	</div>
</div><!-- form -->
