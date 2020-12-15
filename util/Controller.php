<?php

/**
* author: TeamDash
**/

abstract class Controller {
    
    /**
    * get in which folder is the view wanted
    * @return: $folder - wanted folder
    */
    abstract public function getFolder();

    /**
    * load the model needed
    * @param: $model wanted
    */
    public function loadModel(string $model) {

        require_once('../models/'.$model.'.php');
        $this->$model = new $model();

    }

    /**
    * define the view to display
    * @param: $file - view wanted
    * @param: $data 
    */
    public function render(string $file, array $data = []) {

        extract($data);

        ob_start();// Start buffer
        require_once('../views/'.strtolower($this->getFolder()).'/'.$file.'.php');
        
        $content = ob_get_clean();

        require_once('../views/data.php');
        
    }

}