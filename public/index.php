<?php

use core\Config;
use core\Router;

require_once(dirname(__DIR__) . '/core/RouteNames.php');

spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    require(dirname(__DIR__) . '/' . $class_name . '.php');
});

set_error_handler('core\ErrorHandler::handleError');
set_exception_handler('core\ErrorHandler::handleException');

Config::loadConfig();

$router = new Router();
$router->add('', ['controller' => 'Home', 'action' => 'index']);
$router->add(ROUTE_HOME, ['controller' => 'Home', 'action' => 'index']);
$router->add(ROUTE_LOGIN, ['controller' => 'Login', 'action' => 'show']);
$router->add(ROUTE_LOGOUT, ['controller' => 'Login', 'action' => 'logout']);

// Contractors
$router->add(ROUTE_CONTRACTORS . '/' . ACTION_SHOW, ['controller' => 'Contractors', 'action' => 'show']);
$router->add(ROUTE_CONTRACTORS . '/' . ACTION_CREATE, ['controller' => 'Contractors', 'action' => 'create']);
$router->add(ROUTE_CONTRACTORS . '/{id:\d+}/' . ACTION_DETAILS, ['controller' => 'Contractors', 'action' => 'details']);

// Invoices
$router->add(ROUTE_INVOICES . '/' . ACTION_SHOW, ['controller' => 'Invoices', 'action' => 'show']);
$router->add(ROUTE_INVOICES . '/' . ACTION_ADD, ['controller' => 'Invoices', 'action' => 'add']);
$router->add(ROUTE_INVOICES . '/' . ACTION_CREATE, ['controller' => 'Invoices', 'action' => 'create']);
$router->add(ROUTE_INVOICES . '/' . ACTION_FILTER, ['controller' => 'Invoices', 'action' => 'filter']);
$router->add(ROUTE_INVOICES . '/' . ACTION_SEARCH, ['controller' => 'Invoices', 'action' => 'search']);
$router->add(ROUTE_INVOICES . '/{id:\d+}/' . ACTION_DELETE, ['controller' => 'Invoices', 'action' => 'delete']);
$router->add(ROUTE_INVOICES . '/{id:\d+}/' . ACTION_EDIT, ['controller' => 'Invoices', 'action' => 'edit']);
$router->add(ROUTE_INVOICES . '/{id:\d+}/' . ACTION_DETAILS, ['controller' => 'Invoices', 'action' => 'details']);
$router->add(ROUTE_INVOICES . '/{id:\d+}/' . ACTION_UPDATE, ['controller' => 'Invoices', 'action' => 'update']);
$router->add(ROUTE_INVOICES . '/{id:\d+}/' . ACTION_DOWNLOAD, ['controller' => 'Invoices', 'action' => 'download']);

$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

$router->dispatch($_SERVER['QUERY_STRING']);
