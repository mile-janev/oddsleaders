<?php
/* @var $this UserController */
/* @var $model User */
?>

<h1>Register</h1>

<?php $this->renderPartial('/user/_form', array('model'=>$model, 'facebook' => $facebook)); ?>
