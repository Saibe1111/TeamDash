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
    public function loadModel (string $model) {

        require_once('models/'.$model.'.php');
        $this->$model = new $model();

    }

    /**
    * render the view wanted 
    * @param: $file - view wanted
    */
    public function render(string $file) {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            require_once('views/'.strtolower($this->getFolder()).'/'.$file.'.php');
            return;
            
        } 

    }

}