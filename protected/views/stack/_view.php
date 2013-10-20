<?php
/* @var $this StackController */
/* @var $data Stack */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
	<?php echo CHtml::encode($data->link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tournament_id')); ?>:</b>
	<?php echo CHtml::encode($data->tournament_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cron')); ?>:</b>
	<?php echo CHtml::encode($data->cron); ?>
	<br />


</div>