<?php
/* @var $this GameController */
/* @var $model Game */
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
		<?php echo $form->label($model,'home_id'); ?>
		<?php echo $form->textField($model,'home_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'guest_id'); ?>
		<?php echo $form->textField($model,'guest_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start'); ?>
		<?php echo $form->textField($model,'start'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'home_goals'); ?>
		<?php echo $form->textField($model,'home_goals',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'guest_goals'); ?>
		<?php echo $form->textField($model,'guest_goals',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->