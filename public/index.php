<?php

use Core\Router;

spl_autoload_register(function ($class_name) {
    require('../' . $class_name . '.php');
});

error_reporting(E_ALL);
set_error_handler('core\ErrorHandler::handleError');
set_exception_handler('core\ErrorHandler::handleException');

$router = new Router();
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

$router->dispatch($_SERVER['QUERY_STRING']);
