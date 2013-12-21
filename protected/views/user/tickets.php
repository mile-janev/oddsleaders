<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
    'htmlOptions' => array('class' => 'userGridNew'),
	'dataProvider'=>$dataProvider,
	'filter'=>$model,
	'columns'=>array(
                array(
                    'name'=>'id',
                    'value'=>'Chtml::link($data->id, Yii::app()->createUrl("user/ticket", array("id"=>$data->id)))',
                    'sortable'=>TRUE,
                    'type'  => 'raw',
                ),
                'odd',
                'deposit',
                'earning',
                'status'
	),
)); ?>