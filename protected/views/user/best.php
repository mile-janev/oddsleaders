<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                    'name'=>'username',
                    'value'=>'Chtml::link($data->username, Yii::app()->createUrl("user/view", array("id"=>$data->id)))',
                    'sortable'=>TRUE,
                    'type'  => 'raw',
                ),
                'conto',
                'conto_all'
	),
)); ?>