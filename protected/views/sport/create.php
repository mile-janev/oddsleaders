<?php
/* @var $this SportController */
/* @var $model Sport */

$this->menu=array(
	array('label'=>'List Sport', 'url'=>array('index')),
	array('label'=>'Manage Sport', 'url'=>array('admin')),
);
?>

<h1>Create Sport</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>