<?php

// change the following paths if necessary

if($_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == 'oddsleaders.dev'){
    $yii=dirname(__FILE__).'/../yii-1.1.14.f0fee9/framework/yii.php';
    $config=dirname(__FILE__).'/protected/config/main-local.php';
}
else if($_SERVER['SERVER_NAME'] == 'staging.oddsleaders.com' || $_SERVER['SERVER_NAME'] == 'www.staging.oddsleaders.com'){
    $yii=dirname(__FILE__).'/../../../public_html/yii/framework/yii.php';
    $config=dirname(__FILE__).'/protected/config/main-beta.php';
}
else{
    $yii=dirname(__FILE__).'/../yii-1.1.14.f0fee9/framework/yii.php';
    $config=dirname(__FILE__).'/protected/config/main.php';
}

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
