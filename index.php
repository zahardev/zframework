<?php

require_once 'autoload.php';

$request = $_SERVER['REQUEST_URI'];

$request = trim($request, '/');

if ($request) {
    $request        = explode('/', $request);
    $controllerName = '\\App\\Controllers\\'.ucfirst($request[0]).'Controller';
    $action         = ucfirst($request[1]);
}

$action         = $action ?? 'Index';
$controllerName = $controllerName ?? '\\App\\Controllers\\NewsController';

$controller = new $controllerName();
/**@var \App\Controller $controller */
$controller->action($action);
