<?php

spl_autoload_register(function($class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    require($class_name.'.php');
});

$routes = require('routes.php');

$matched = false;
$key;
foreach($routes as $pattern => $action) {
    if ("{$pattern}" == $_SERVER['REQUEST_URI']){
        $matched = true;
        $key = "{$pattern}";
        break;
    }
}
if (!$matched) { 
    http_response_code(404);
    exit;
}

list($class, $method) = explode('@', $routes[$key]);

$controller = new $class();

function render($view) {
    require("Views/$view.php");
}

$controller->$method();
