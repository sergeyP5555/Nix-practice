<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require 'vendor/autoload.php';

use App\core\Router;
use App\lib\Session\Session;


$session = new Session();
$session->start();
$router = new Router();
$router->run();
