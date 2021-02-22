<?php

use Vendor\Core\Application;

ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../vendor/bootstrap.php';
$config = require_once(realpath('../config.php'));

$router->run();
$app = new Application(dirname(__DIR__));
