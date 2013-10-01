<?php
/* @var $this RoundController */
/* @var $model Round */

$this->breadcrumbs=array(
	'Rounds'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Round', 'url'=>array('index')),
	array('label'=>'Create Round', 'url'=>array('create')),
	array('label'=>'Update Round', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Round', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Round', 'url'=>array('admin')),
);
?>

<h1>View Round #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'identificator',
		'date_from',
		'date_to',
		'date_created',
		'date_modified',
		'game_id',
		'house_id',
	),
)); ?>
