<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" /> -->
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome.min.css" />
        <!--[if lt IE 8]>
                <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/font-awesome-ie7.min.css" media="screen, projection" />
        <![endif]-->
        <?php
            $script = Yii::app()->clientScript;
            $script->registerCoreScript('jquery');
            $baseUrl = Yii::app()->request->baseUrl;
            $script->registerScriptFile($baseUrl . '/js/nanoScroller.js');
            $script->registerScriptFile($baseUrl . '/js/main.js');
            $script->registerScriptFile($baseUrl . '/js/jquery-cookie/jquery.cookie.js');
        ?>

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>

        <?php $this->renderPartial('/layouts/_header'); ?>

        <div id="wrapped">
            <div id="content">
                <?php $this->renderPartial('/layouts/_left') ?>
                <div id="main">
                    <?php echo $content; ?>
                </div>
                <?php $this->renderPartial('/layouts/_right'); ?>
            </div>
        </div>

        <?php $this->renderPartial('/layouts/_footer'); ?>
    </body>
</html>
