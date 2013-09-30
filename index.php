<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../yii-1.1.14.f0fee9/framework/yii.php';

if($_SERVER['SERVER_NAME'] == 'localhost'){
    $config=dirname(__FILE__).'/protected/config/main-local.php';
}
else if($_SERVER['SERVER_NAME'] == 'beta.oddsleaders.com' || $_SERVER['SERVER_NAME'] == 'www.beta.oddsleaders.com'){
    $config=dirname(__FILE__).'/protected/config/main-beta.php';
}
else{
    $config=dirname(__FILE__).'/protected/config/main.php';
    var_dump("da");
}

$config=dirname(__FILE__).'/protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
