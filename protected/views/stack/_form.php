<?php
/* @var $this StackController */
/* @var $model Stack */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stack-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
        
	<div class="row">
		<?php echo $form->labelEx($model,'opponent'); ?>
		<?php echo $form->textField($model,'opponent',array('size'=>60,'maxlength'=>256)); ?>
		<?php echo $form->error($model,'opponent'); ?>
	</div>

        <div class="row">
                <div id="dateValue" style="display: none"><?php echo ($model->start) ? date("Y-m-d H:i:s", $model->start) : "" ?></div>
		<?php echo $form->labelEx($model,'start'); ?>
                <?php if($model->isNewRecord) { ?>
                    <?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
                        $this->widget('CJuiDateTimePicker',array(
                            'model'=>$model, //Model object
                            'mode'=>'datetime', //use "time","date" or "datetime" (default)
                            'attribute'=>'start',//attribute name
                            'language'=>'mk',
                            'options'=>array(
                                'showSecond'=>true,
                                'dateFormat'=>'yy-mm-dd',
                                'timeFormat'=>'hh:mm:ss',
                            ) // jquery plugin options
                        ));
                    ?>
                <?php } else { ?>
                    <?php echo $form->textField($model,'start',array('size'=>60,'maxlength'=>256)); ?>
                <?php } ?>
		<?php echo $form->error($model,'start'); ?>
	</div>

	<div class="row">
                <?php $coefficients = '{"match":{"label":"Match","1":"1,0","x":"1,0","2":"1,0"},"double-chance":{"label":"Double Chance","1x":"1,0","x2":"1,0"},"how-many-goals":{"label":"How many goals","0-2":"1,0","3+":"1,0"}}'; ?>
		<?php echo $form->labelEx($model,'data'); ?>
            <?php if($model->isNewRecord) { ?>
		<?php echo $form->textArea($model,'data',array('class'=>'coefficients-textarea','value' => Oddsleaders::pretty_print($coefficients))); ?>
            <?php } else { ?>
                <?php echo $form->textArea($model,'data',array('class'=>'coefficients-textarea')); ?>
            <?php } ?>
		<?php echo $form->error($model,'data'); ?>
	</div>
        
        <div class="row">
            <br />
                <div class="note">Example: {"final":{"team1":3,"team2":1}}</div>
		<?php echo $form->labelEx($model,'result'); ?>
		<?php echo $form->textArea($model,'result',array('class'=>'coefficients-textarea')); ?>
		<?php echo $form->error($model,'result'); ?>
	</div>
    
	<div class="row">
                <?php $opts = CHtml::listData($allTournaments,'id','name'); ?>
		<?php echo $form->labelEx($model,'tournament_id'); ?>
		<?php echo $form->dropDownList($model,'tournament_id',$opts); ?>
		<?php echo $form->error($model,'tournament_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
$(document).ready(function() {
    $("#Stack_start").val($("#dateValue").html());
})
</script>