<?php
$folder_path = 'util/';
foreach (new DirectoryIterator($folder_path) as $file) {
    if ($file->isDot()) continue;
    $file_name = $folder_path.$file->getFilename();
    require_once $file_name;
}

spl_autoload_register(function($class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    require($class_name.'.php');
});

$routes = require('layout/routes.php');
$matched = false;
$key = NULL;
foreach($routes as $pattern => $action) {
    if ("{$pattern}" == $_SERVER['REQUEST_URI']){
        $matched = true;
        $key = "{$pattern}";
        break;
    }
}

if (!$matched) { 
    $key = 'error';
    list($class, $method) = explode('@', $routes[$key]);
    $controller = new $class();
    $controller->$method();
    exit;
}

list($class, $method) = explode('@', $routes[$key]);

$controller = new $class();
$controller->$method();