<?php
/* @var $this UserRolesController */
/* @var $model UserRoles */

$this->breadcrumbs=array(
	'User Roles'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UserRoles', 'url'=>array('index')),
	array('label'=>'Create UserRoles', 'url'=>array('create')),
	array('label'=>'Update UserRoles', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UserRoles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UserRoles', 'url'=>array('admin')),
);
?>

<h1>View UserRoles #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
		'role',
	),
)); ?>
