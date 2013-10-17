<?php
/* @var $this TournamentController */
/* @var $model Tournament */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tournament-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'link'); ?>
		<?php echo $form->textArea($model,'link',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'link'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'active'); ?>
		<?php echo $form->textField($model,'active'); ?>
		<?php echo $form->error($model,'active'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sport_id'); ?>
		<?php echo $form->textField($model,'sport_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'sport_id'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'cron_time'); ?>
		<?php echo $form->textField($model,'cron_time',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'cron_time'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'cron_group'); ?>
		<?php echo $form->textField($model,'cron_group',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cron_group'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->