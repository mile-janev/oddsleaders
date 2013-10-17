<?php
/* @var $this TournamentController */
/* @var $data Tournament */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('link')); ?>:</b>
	<?php echo CHtml::encode($data->link); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('active')); ?>:</b>
	<?php echo CHtml::encode($data->active); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sport_id')); ?>:</b>
	<?php echo CHtml::encode($data->sport_id); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('cron_time')); ?>:</b>
	<?php echo CHtml::encode($data->cron_time); ?>
	<br />
        
        <b><?php echo CHtml::encode($data->getAttributeLabel('cron_group')); ?>:</b>
	<?php echo CHtml::encode($data->cron_group); ?>
	<br />

</div>