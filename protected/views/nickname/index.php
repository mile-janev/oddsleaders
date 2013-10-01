<?php
/* @var $this NicknameController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Nicknames',
);

$this->menu=array(
	array('label'=>'Create Nickname', 'url'=>array('create')),
	array('label'=>'Manage Nickname', 'url'=>array('admin')),
);
?>

<h1>Nicknames</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
