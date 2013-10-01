<?php
/* @var $this RoundController */
/* @var $model Round */

$this->breadcrumbs=array(
	'Rounds'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Round', 'url'=>array('index')),
	array('label'=>'Create Round', 'url'=>array('create')),
	array('label'=>'View Round', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Round', 'url'=>array('admin')),
);
?>

<h1>Update Round <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>