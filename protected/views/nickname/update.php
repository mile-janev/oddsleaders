<?php
/* @var $this NicknameController */
/* @var $model Nickname */

$this->breadcrumbs=array(
	'Nicknames'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Nickname', 'url'=>array('index')),
	array('label'=>'Create Nickname', 'url'=>array('create')),
	array('label'=>'View Nickname', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Nickname', 'url'=>array('admin')),
);
?>

<h1>Update Nickname <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>