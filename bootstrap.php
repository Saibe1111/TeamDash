<?php

//We take the parameters of the url 
$params = explode('/', $_SERVER[REQUEST_URI]);

//Autoload
spl_autoload_register(function ($class_name) {
    $class_name = str_replace('\\', '/', $class_name);
    require('class/'. $class_name.'.php');
});


//We see if there is a parameter
if(!($params[1] != "")  ){
    header('Location: /authentication/login');
    exit();
}

$controller = ucfirst($params[1]);
$action = isset($params[2]) ? $params[2] : 'index';
require_once('controllers/'.$controller.'.php');

$controller = new $controller();

if(method_exists($controller,$action)){
    unset($params[0]);
    unset($params[1]);
    unset($params[2]);
    call_user_func_array([$controller, $action], $params);
}else{
    http_response_code(404);
    echo "La page existe pas :/";
}