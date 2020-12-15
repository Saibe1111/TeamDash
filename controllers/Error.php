<?php

/**
* author: TeamDash
* description: controller for error
* see: ../util/Controller.php
**/

namespace Controllers;

class Error extends \Controller {

    
    // show the view for error 404
    public function notFound() {
        $this->render('404');
    }

    public function getFolder() {
        $folder = explode('\\', __CLASS__);
        return array_pop($folder);
    }
}