<?php 
namespace Controllers;

class Authentication extends \Controller {
    
    public function login() {
        $this->render('login');
    }

    public function register() {
        $this->render('register');
    }

    public function getFolder() {
        $folder = explode('\\', __CLASS__);
        return array_pop($folder);
    }
}
