<?php
/* @var $this RoundController */
/* @var $data Round */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('identificator')); ?>:</b>
	<?php echo CHtml::encode($data->identificator); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_from')); ?>:</b>
	<?php echo CHtml::encode($data->date_from); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_to')); ?>:</b>
	<?php echo CHtml::encode($data->date_to); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_created')); ?>:</b>
	<?php echo CHtml::encode($data->date_created); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_modified')); ?>:</b>
	<?php echo CHtml::encode($data->date_modified); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_id')); ?>:</b>
	<?php echo CHtml::encode($data->game_id); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('house_id')); ?>:</b>
	<?php echo CHtml::encode($data->house_id); ?>
	<br />

	*/ ?>

</div>