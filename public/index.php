<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/../dependencies/framework/yii.php';
$config=dirname(__FILE__).'/../protected/config/main.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

/**
 * Dump a variable
 *
 * @param     $var
 * @param int $exit
 */
function D($var, $exit = 0)
{
    CVarDumper::dump($var, 10, true);

    if ($exit) {
        exit;
    }

}

require_once($yii);
Yii::createWebApplication($config)->run();
