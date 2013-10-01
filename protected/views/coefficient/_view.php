<?php
/* @var $this CoefficientController */
/* @var $data Coefficient */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('game_id')); ?>:</b>
	<?php echo CHtml::encode($data->game_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('house_id')); ?>:</b>
	<?php echo CHtml::encode($data->house_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('home_win')); ?>:</b>
	<?php echo CHtml::encode($data->home_win); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('guest_win')); ?>:</b>
	<?php echo CHtml::encode($data->guest_win); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('draw')); ?>:</b>
	<?php echo CHtml::encode($data->draw); ?>
	<br />


</div>