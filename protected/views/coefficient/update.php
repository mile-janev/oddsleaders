<?php
/* @var $this CoefficientController */
/* @var $model Coefficient */

$this->breadcrumbs=array(
	'Coefficients'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Coefficient', 'url'=>array('index')),
	array('label'=>'Create Coefficient', 'url'=>array('create')),
	array('label'=>'View Coefficient', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Coefficient', 'url'=>array('admin')),
);
?>

<h1>Update Coefficient <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>