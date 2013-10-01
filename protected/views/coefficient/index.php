<?php
/* @var $this CoefficientController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Coefficients',
);

$this->menu=array(
	array('label'=>'Create Coefficient', 'url'=>array('create')),
	array('label'=>'Manage Coefficient', 'url'=>array('admin')),
);
?>

<h1>Coefficients</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
