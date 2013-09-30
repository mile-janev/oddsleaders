<?php
/* @var $this UserRolesController */
/* @var $model UserRoles */

$this->breadcrumbs=array(
	'User Roles'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UserRoles', 'url'=>array('index')),
	array('label'=>'Create UserRoles', 'url'=>array('create')),
	array('label'=>'View UserRoles', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UserRoles', 'url'=>array('admin')),
);
?>

<h1>Update UserRoles <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>