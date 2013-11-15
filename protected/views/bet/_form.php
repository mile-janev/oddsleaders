<?php
/* @var $this BetController */
/* @var $model Bet */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'bet-form',
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
		<?php echo $form->labelEx($model,'opponent'); ?>
		<?php echo $form->textField($model,'opponent',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'opponent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stack_ids'); ?>
		<?php echo $form->textArea($model,'stack_ids',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'stack_ids'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'game_type'); ?>
		<?php echo $form->textField($model,'game_type',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'game_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'possibility'); ?>
		<?php echo $form->textField($model,'possibility',array('size'=>32,'maxlength'=>32)); ?>
		<?php echo $form->error($model,'possibility'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'odds'); ?>
		<?php echo $form->textField($model,'odds'); ?>
		<?php echo $form->error($model,'odds'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'result'); ?>
		<?php echo $form->textField($model,'result'); ?>
		<?php echo $form->error($model,'result'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->