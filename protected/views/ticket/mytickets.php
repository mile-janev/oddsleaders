<?php
/* @var $this TicketController */
/* @var $model Ticket */

$this->breadcrumbs=array(
	'Tickets'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Ticket', 'url'=>array('index')),
	array('label'=>'Create Ticket', 'url'=>array('create')),
	array('label'=>'Update Ticket', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Ticket', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Ticket', 'url'=>array('admin')),
);
?>

<h1>Your Tickets</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'ticket-grid',
	'htmlOptions' => array('class' => 'userGridNew'),
	'dataProvider'=>$model->search('true'),
	'rowCssClassExpression' => '
        ( $data->status != "0" ? ($data->status == "1") ? "win" : "lose" : "" )
    ',
	'filter'=>$model,
	'columns'=>array(
		array(
                'name'=>'id',
                'value'=>'"#".$data->id',
            ),
		'odd',
		array(
                'name'=>'deposit',
                'value'=>'Yii::app()->numberFormatter->formatCurrency($data->deposit, "EUR")',
            ),
		array(
                'name'=>'earning',
                'value'=>'Yii::app()->numberFormatter->formatCurrency($data->earning, "EUR")',
            ),
		array(
                'name'=>'earning',
                'value'=>'( $data->status != "0" ? ($data->status == "1") ? "WIN" : "LOSE" : "STILL PLAY" )',
            ),
		array(
			'class'=>'CButtonColumn',
			'header' => Yii::t( 'app', 'View' ),
			'template'=>'{view}',
			'buttons' => array(
                'view'=>array(
                        'label'=>'View Ticket',
                        'url'=>'Yii::app()->createUrl("ticket/check", array("id"=>$data->id))',
                        'imageUrl'=>'images/zoom.png',
                ),
            ),
		),
	),
)); ?>
