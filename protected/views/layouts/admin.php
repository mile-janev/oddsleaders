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
        ?>

        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>

        <?php $this->renderPartial('/layouts/_header'); ?>

        <div id="wrapped">
            <div id="content">
                <div id="main" class="adminMain">
                    <ul id="adminMenu">
                        <li><?php echo CHtml::link('User', Yii::app()->createUrl('user/admin')); ?></li>
                        <li><?php echo CHtml::link('Month History', Yii::app()->createUrl('history/admin')); ?></li>
                        <li><?php echo CHtml::link('Bet Ticket', Yii::app()->createUrl('ticket/admin')); ?></li>
                        <li><?php echo CHtml::link('Bet Games', Yii::app()->createUrl('game/admin')); ?></li>
                        <li><?php echo CHtml::link('Country', Yii::app()->createUrl('country/admin')); ?></li>
                        <li><?php echo CHtml::link('Sport', Yii::app()->createUrl('sport/admin')); ?></li>
                        <li><?php echo CHtml::link('Tournament', Yii::app()->createUrl('tournament/admin')); ?></li>
                        <li><?php echo CHtml::link('Stack', Yii::app()->createUrl('stack/admin')); ?></li>
                        <li><?php echo CHtml::link('Top Matches', Yii::app()->createUrl('stack/admintopmatches')); ?></li>
                    </ul>
                    <div class="adminContentWrapper">
                        <?php echo $content; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->renderPartial('/layouts/_footer'); ?>


    </body>
</html>
