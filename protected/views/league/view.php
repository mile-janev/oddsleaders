<?php
/* @var $this LeagueController */
/* @var $model League */

$this->breadcrumbs=array(
	'Leagues'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List League', 'url'=>array('index')),
	array('label'=>'Create League', 'url'=>array('create')),
	array('label'=>'Update League', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete League', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage League', 'url'=>array('admin')),
);
?>

<h1>View League #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'slug',
	),
)); ?>
