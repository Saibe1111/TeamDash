<?php
abstract class Controller{
    
    public function loadModel(string $model){
        require_once('../models/'.$model.'.php');
        $this->$model = new $model();
    }

    public function render(string $file, array $data = []){
        extract($data);

        ob_start();// Start buffer
        require_once('../views/'.strtolower(get_class($this)).'/'.$file.'.php');

        $content = ob_get_clean();

        if(isset($_SESSION['id'])){
            require_once('../views/layouts/default_logout.php');
        }else{
            require_once('../views/layouts/default.php');
        }
       
    }

}