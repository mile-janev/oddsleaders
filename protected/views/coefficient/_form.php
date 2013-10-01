<?php
/* @var $this CoefficientController */
/* @var $model Coefficient */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'coefficient-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'game_id'); ?>
		<?php echo $form->textField($model,'game_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'game_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'house_id'); ?>
		<?php echo $form->textField($model,'house_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'house_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'home_win'); ?>
		<?php echo $form->textField($model,'home_win'); ?>
		<?php echo $form->error($model,'home_win'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'guest_win'); ?>
		<?php echo $form->textField($model,'guest_win'); ?>
		<?php echo $form->error($model,'guest_win'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'draw'); ?>
		<?php echo $form->textField($model,'draw'); ?>
		<?php echo $form->error($model,'draw'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->