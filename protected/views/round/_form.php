<?php
/* @var $this RoundController */
/* @var $model Round */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'round-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'identificator'); ?>
		<?php echo $form->textField($model,'identificator',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'identificator'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_from'); ?>
		<?php echo $form->textField($model,'date_from'); ?>
		<?php echo $form->error($model,'date_from'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_to'); ?>
		<?php echo $form->textField($model,'date_to'); ?>
		<?php echo $form->error($model,'date_to'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_created'); ?>
		<?php echo $form->textField($model,'date_created'); ?>
		<?php echo $form->error($model,'date_created'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_modified'); ?>
		<?php echo $form->textField($model,'date_modified'); ?>
		<?php echo $form->error($model,'date_modified'); ?>
	</div>

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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->