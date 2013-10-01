<?php
/* @var $this RoleController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Role',
);

$this->menu=array(
	array('label'=>'Create Role', 'url'=>array('create')),
	array('label'=>'Manage Role', 'url'=>array('admin')),
);
?>

<h1>Role</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
