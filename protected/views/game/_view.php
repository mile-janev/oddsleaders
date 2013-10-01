<?php
/* @var $this GameController */
/* @var $data Game */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('home_id')); ?>:</b>
	<?php echo CHtml::encode($data->home_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('guest_id')); ?>:</b>
	<?php echo CHtml::encode($data->guest_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start')); ?>:</b>
	<?php echo CHtml::encode($data->start); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('home_goals')); ?>:</b>
	<?php echo CHtml::encode($data->home_goals); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('guest_goals')); ?>:</b>
	<?php echo CHtml::encode($data->guest_goals); ?>
	<br />


</div>