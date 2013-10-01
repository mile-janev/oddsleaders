<?php
/* @var $this CoefficientController */
/* @var $model Coefficient */

$this->breadcrumbs=array(
	'Coefficients'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Coefficient', 'url'=>array('index')),
	array('label'=>'Create Coefficient', 'url'=>array('create')),
	array('label'=>'Update Coefficient', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Coefficient', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Coefficient', 'url'=>array('admin')),
);
?>

<h1>View Coefficient #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'game_id',
		'house_id',
		'home_win',
		'guest_win',
		'draw',
	),
)); ?>
