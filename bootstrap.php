<?php

//On prend les paramètres de l'url 
$params = explode('/', $_SERVER[REQUEST_URI]);

require_once('class/Controller.php');
require_once('class/Model.php');

//On regarde si il y a un paramète
if( ($params[1] != "")  ){
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
}else{
    header('Location: /authentication/login');
    exit();
}