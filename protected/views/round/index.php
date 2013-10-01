<?php
/* @var $this RoundController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Rounds',
);

$this->menu=array(
	array('label'=>'Create Round', 'url'=>array('create')),
	array('label'=>'Manage Round', 'url'=>array('admin')),
);
?>

<h1>Rounds</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
