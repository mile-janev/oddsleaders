<?php
/* @var $this CoefficientController */
/* @var $model Coefficient */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'game_id'); ?>
		<?php echo $form->textField($model,'game_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'house_id'); ?>
		<?php echo $form->textField($model,'house_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'home_win'); ?>
		<?php echo $form->textField($model,'home_win'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'guest_win'); ?>
		<?php echo $form->textField($model,'guest_win'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'draw'); ?>
		<?php echo $form->textField($model,'draw'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->