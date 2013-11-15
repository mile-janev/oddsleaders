<?php
/* @var $this BetController */
/* @var $data Bet */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('code')); ?>:</b>
	<?php echo CHtml::encode($data->code); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('opponent')); ?>:</b>
	<?php echo CHtml::encode($data->opponent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('stack_ids')); ?>:</b>
	<?php echo CHtml::encode($data->stack_ids); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_type')); ?>:</b>
	<?php echo CHtml::encode($data->game_type); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('possibility')); ?>:</b>
	<?php echo CHtml::encode($data->possibility); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('odds')); ?>:</b>
	<?php echo CHtml::encode($data->odds); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('result')); ?>:</b>
	<?php echo CHtml::encode($data->result); ?>
	<br />

	*/ ?>

</div>