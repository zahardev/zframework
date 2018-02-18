<?php

try{
    require_once 'autoload.php';

    $request = $_SERVER['REQUEST_URI'];

    $request = trim($request, '/');

    if ($request) {
        $request        = explode('/', $request);
        $controllerName = '\\App\\Controllers\\'.ucfirst($request[0]).'Controller';

        if(isset($request[1])){
            $action         = ucfirst($request[1]);
        }
    }

    if(isset($_REQUEST['action'])){
        $action = $_REQUEST['action'];
    }

    $controllerName = $controllerName ?? '\\App\\Controllers\\HomeController';
    $action         = $action ?? 'Index';

    $controller = new $controllerName();
    /**@var \App\Controller $controller */
    $controller->action($action);
} catch(\Exception $e){
    echo $e->getMessage();
}

