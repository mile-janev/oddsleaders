<?php
/* @var $this NicknameController */
/* @var $model Nickname */

$this->breadcrumbs=array(
	'Nicknames'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Nickname', 'url'=>array('index')),
	array('label'=>'Create Nickname', 'url'=>array('create')),
	array('label'=>'Update Nickname', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Nickname', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Nickname', 'url'=>array('admin')),
);
?>

<h1>View Nickname #<?php echo $model->id; ?></h1>

<div class="view">

    <b><?php echo CHtml::encode($model->getAttributeLabel('team_id')); ?>:</b>
    <?php echo CHtml::encode($model->team_id); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('house_id')); ?>:</b>
    <?php echo CHtml::encode($model->house->name); ?>
    <br />

    <b><?php echo CHtml::encode($model->getAttributeLabel('name')); ?>:</b>
    <?php echo CHtml::encode($model->name); ?>
    <br />

</div>
