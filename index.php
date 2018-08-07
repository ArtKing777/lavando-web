<?php
$loader = require_once('vendor/autoload.php');


$SnehApp = "hydropac";

 //require_once 'google/appengine/api/cloud_storage/CloudStorageTools.php';
//use google\appengine\api\cloud_storage\CloudStorageTools;

date_default_timezone_set('Europe/London');
ini_set("memory_limit","512M");
// change the following paths if necessary

$yii=dirname(__FILE__).'/yii/yii.php';
$config=dirname(__FILE__).'/protected/config/apps/' . $SnehApp . '.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::$classMap = $loader->getClassMap();
Yii::setPathOfAlias('Flow', dirname(__FILE__) . '/protected/vendors/Flow');
Yii::createWebApplication($config)->run();