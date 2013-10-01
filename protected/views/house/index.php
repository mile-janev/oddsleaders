<?php
/* @var $this HouseController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Houses',
);

$this->menu=array(
	array('label'=>'Create House', 'url'=>array('create')),
	array('label'=>'Manage House', 'url'=>array('admin')),
);
?>

<h1>Houses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
