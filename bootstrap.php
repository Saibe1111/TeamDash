<?php

/**
* author: TeamDash
* see: controllers, layout/routes.php
**/

// require all the class of the util folder which are needed
$folder_path = 'util/';
foreach (new DirectoryIterator($folder_path) as $file) {
    if ($file->isDot()) continue;
    $file_name = $folder_path.$file->getFilename();
    require_once $file_name;
}

// configure the autoloader
spl_autoload_register(function($class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    require($class_name.'.php');
});
// include the routes file
$routes = require('layout/routes.php'); 

$matched = false;
$key = NULL;

// try to match the routes to the request URI
foreach($routes as $pattern => $action) {
    if ("{$pattern}" == $_SERVER['REQUEST_URI']){
        $matched = true;
        $key = "{$pattern}";
        break;
    }
}

// don't success to match the routes to the request URI 
// call notFound() to render the error 404 view 
if (!$matched) { 
    $key = 'error';
    list($class, $method) = explode('@', $routes[$key]);
    $controller = new $class();
    $controller->$method();
    exit;
}

// success to match one of the routes to the request URI
// call method according to the routes file

list($class, $method) = explode('@', $routes[$key]);

$controller = new $class();
$controller->$method();