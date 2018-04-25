<?php

use core\Config;
use core\Router;

spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    require(dirname(__DIR__) . '/' . $class_name . '.php');
});

set_error_handler('core\ErrorHandler::handleError');
set_exception_handler('core\ErrorHandler::handleException');

Config::loadConfig();

$router = new Router();
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('home', ['controller' => 'Home', 'action' => 'index']);
$router->add('login', ['controller' => 'Login', 'action' => 'show']);
$router->add('logout', ['controller' => 'Login', 'action' => 'logout']);
$router->add('addContractor', ['controller' => 'AddContractor', 'action' => 'addContractor']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

$router->dispatch($_SERVER['QUERY_STRING']);
