<?php


DEFINE('DS', DIRECTORY_SEPARATOR); 
define('BP', dirname(__FILE__));

require_once BP.DS."config".DS."app.php";
require_once BP.DS."app".DS."bootstrap.php";

$app = new \Core\App($config,$_SERVER);
$app->run();
