<?php

abstract class Controller {

    abstract public function getFolder();

    public function loadModel (string $model) {
        require_once('models/'.$model.'.php');
        $this->$model = new $model();
    }

    public function render(string $file) {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            require_once('views/'.strtolower($this->getFolder()).'/'.$file.'.php');
            return;
        } 
    }

}