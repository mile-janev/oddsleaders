<?php
/* @var $this GameController */
/* @var $model Game */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'game-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'code'); ?>
		<?php echo $form->textField($model,'code',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'code'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type',array('size'=>16,'maxlength'=>16)); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'odd'); ?>
		<?php echo $form->textField($model,'odd'); ?>
		<?php echo $form->error($model,'odd'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ticket_id'); ?>
		<?php echo $form->textField($model,'ticket_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'ticket_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stack_id'); ?>
		<?php echo $form->textField($model,'stack_id',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'stack_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->