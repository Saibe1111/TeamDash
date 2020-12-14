<?php

/**
* author: TeamDash
* description: controller for the errors
* see: ../util/Controller.php
**/

namespace Controllers;

class Error extends \Controller {

    
    // user try to go in an unknown route then show the view for error 404
    public function notFound() {
        $this->render('404');
    }

    public function getFolder() {
        $folder = explode('\\', __CLASS__);
        return array_pop($folder);
    }
}