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
$router->add(ROUTE_LOGIN . '/' . ACTION_LOGIN, ['controller' => 'Login', 'action' => 'login']);

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

// Documents
$router->add(ROUTE_DOCUMENTS . '/' . ACTION_SHOW, ['controller' => 'Documents', 'action' => 'show']);
$router->add(ROUTE_DOCUMENTS . '/' . ACTION_ADD, ['controller' => 'Documents', 'action' => 'add']);
$router->add(ROUTE_DOCUMENTS . '/' . ACTION_CREATE, ['controller' => 'Documents', 'action' => 'create']);
$router->add(ROUTE_DOCUMENTS . '/' . ACTION_FILTER, ['controller' => 'Documents', 'action' => 'filter']);
$router->add(ROUTE_DOCUMENTS . '/' . ACTION_SEARCH, ['controller' => 'Documents', 'action' => 'search']);
$router->add(ROUTE_DOCUMENTS . '/{id:\d+}/' . ACTION_DELETE, ['controller' => 'Documents', 'action' => 'delete']);
$router->add(ROUTE_DOCUMENTS . '/{id:\d+}/' . ACTION_EDIT, ['controller' => 'Documents', 'action' => 'edit']);
$router->add(ROUTE_DOCUMENTS . '/{id:\d+}/' . ACTION_DETAILS, ['controller' => 'Documents', 'action' => 'details']);
$router->add(ROUTE_DOCUMENTS . '/{id:\d+}/' . ACTION_UPDATE, ['controller' => 'Documents', 'action' => 'update']);
$router->add(ROUTE_DOCUMENTS . '/{id:\d+}/' . ACTION_DOWNLOAD, ['controller' => 'Documents', 'action' => 'download']);

// License
$router->add(ROUTE_LICENSE . '/' . ACTION_SHOW, ['controller' => 'License', 'action' => 'show']);
$router->add(ROUTE_LICENSE . '/' . ACTION_ADD, ['controller' => 'License', 'action' => 'add']);
$router->add(ROUTE_LICENSE . '/' . ACTION_CREATE, ['controller' => 'License', 'action' => 'create']);
$router->add(ROUTE_LICENSE . '/' . ACTION_FILTER, ['controller' => 'License', 'action' => 'filter']);
$router->add(ROUTE_LICENSE . '/' . ACTION_SEARCH, ['controller' => 'License', 'action' => 'search']);
$router->add(ROUTE_LICENSE . '/{id:\d+}/' . ACTION_DELETE, ['controller' => 'License', 'action' => 'delete']);
$router->add(ROUTE_LICENSE . '/{id:\d+}/' . ACTION_EDIT, ['controller' => 'License', 'action' => 'edit']);
$router->add(ROUTE_LICENSE . '/{id:\d+}/' . ACTION_DETAILS, ['controller' => 'License', 'action' => 'details']);
$router->add(ROUTE_LICENSE . '/{id:\d+}/' . ACTION_UPDATE, ['controller' => 'License', 'action' => 'update']);
$router->add(ROUTE_LICENSE . '/{id:\d+}/' . ACTION_DOWNLOAD, ['controller' => 'License', 'action' => 'download']);

// Equipment
$router->add(ROUTE_EQUIPMENT . '/' . ACTION_SHOW, ['controller' => 'Equipment', 'action' => 'show']);
$router->add(ROUTE_EQUIPMENT . '/' . ACTION_ADD, ['controller' => 'Equipment', 'action' => 'add']);
$router->add(ROUTE_EQUIPMENT . '/' . ACTION_CREATE, ['controller' => 'Equipment', 'action' => 'create']);
$router->add(ROUTE_EQUIPMENT . '/' . ACTION_FILTER, ['controller' => 'Equipment', 'action' => 'filter']);
$router->add(ROUTE_EQUIPMENT . '/' . ACTION_SEARCH, ['controller' => 'Equipment', 'action' => 'search']);
$router->add(ROUTE_EQUIPMENT . '/{id:\d+}/' . ACTION_DELETE, ['controller' => 'Equipment', 'action' => 'delete']);
$router->add(ROUTE_EQUIPMENT . '/{id:\d+}/' . ACTION_EDIT, ['controller' => 'Equipment', 'action' => 'edit']);
$router->add(ROUTE_EQUIPMENT . '/{id:\d+}/' . ACTION_DETAILS, ['controller' => 'Equipment', 'action' => 'details']);
$router->add(ROUTE_EQUIPMENT . '/{id:\d+}/' . ACTION_UPDATE, ['controller' => 'Equipment', 'action' => 'update']);
$router->add(ROUTE_EQUIPMENT . '/{id:\d+}/' . ACTION_DOWNLOAD, ['controller' => 'Equipment', 'action' => 'download']);

// Attendances
$router->add(ROUTE_ATTENDANCES . '/' . ACTION_SHOW, ['controller' => 'Attendances', 'action' => 'show']);
$router->add(ROUTE_ATTENDANCES . '/' . ACTION_ADD, ['controller' => 'Attendances', 'action' => 'add']);
$router->add(ROUTE_ATTENDANCES . '/' . ACTION_CREATE, ['controller' => 'Attendances', 'action' => 'create']);
$router->add(ROUTE_ATTENDANCES . '/' . ACTION_FILTER, ['controller' => 'Attendances', 'action' => 'filter']);
$router->add(ROUTE_ATTENDANCES . '/' . ACTION_SEARCH, ['controller' => 'Attendances', 'action' => 'search']);
$router->add(ROUTE_ATTENDANCES . '/{id:\d+}/' . ACTION_DELETE, ['controller' => 'Attendances', 'action' => 'delete']);
$router->add(ROUTE_ATTENDANCES . '/{id:\d+}/' . ACTION_EDIT, ['controller' => 'Attendances', 'action' => 'edit']);
$router->add(ROUTE_ATTENDANCES . '/{id:\d+}/' . ACTION_DETAILS, ['controller' => 'Attendances', 'action' => 'details']);
$router->add(ROUTE_ATTENDANCES . '/{id:\d+}/' . ACTION_UPDATE, ['controller' => 'Attendances', 'action' => 'update']);
$router->add(ROUTE_ATTENDANCES . '/{id:\d+}/' . ACTION_DOWNLOAD, ['controller' => 'Attendances', 'action' => 'download']);

$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');

$router->dispatch($_SERVER['QUERY_STRING']);
