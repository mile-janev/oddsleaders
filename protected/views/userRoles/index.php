<?php
/* @var $this UserRolesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'User Roles',
);

$this->menu=array(
	array('label'=>'Create UserRoles', 'url'=>array('create')),
	array('label'=>'Manage UserRoles', 'url'=>array('admin')),
);
?>

<h1>User Roles</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
