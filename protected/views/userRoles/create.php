<?php
/* @var $this UserRolesController */
/* @var $model UserRoles */

$this->breadcrumbs=array(
	'User Roles'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UserRoles', 'url'=>array('index')),
	array('label'=>'Manage UserRoles', 'url'=>array('admin')),
);
?>

<h1>Create UserRoles</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>