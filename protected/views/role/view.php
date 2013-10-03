<?php
/* @var $this RoleController */
/* @var $model Role */

$this->breadcrumbs=array(
	'Role'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Role', 'url'=>array('index')),
	array('label'=>'Create Role', 'url'=>array('create')),
	array('label'=>'Update Role', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Role', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Role', 'url'=>array('admin')),
);
?>

<h1>View Role #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'user_id',
                array(
                    'name'=>'username',
                    'value'=>$model->user->username,
                    'sortable'=>TRUE,
                ),
                'role',
	),
)); ?>
