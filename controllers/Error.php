<?php

namespace Controllers;

class Error extends \Controller {

    public function notFound() {
        $this->render('404');
    }

    public function getFolder() {
        $folder = explode('\\', __CLASS__);
        return array_pop($folder);
    }
}