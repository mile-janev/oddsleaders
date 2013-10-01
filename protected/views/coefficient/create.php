<?php
/* @var $this CoefficientController */
/* @var $model Coefficient */

$this->breadcrumbs=array(
	'Coefficients'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Coefficient', 'url'=>array('index')),
	array('label'=>'Manage Coefficient', 'url'=>array('admin')),
);
?>

<h1>Create Coefficient</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>