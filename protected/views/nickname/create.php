<?php
/* @var $this NicknameController */
/* @var $model Nickname */

$this->breadcrumbs=array(
	'Nicknames'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Nickname', 'url'=>array('index')),
	array('label'=>'Manage Nickname', 'url'=>array('admin')),
);
?>

<h1>Create Nickname</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'houses'=>$houses)); ?>