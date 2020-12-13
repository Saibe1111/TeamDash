<?php 
namespace Controllers;

class Authentication extends \Controller {
    
    public function login() {
        $this->render('login');

        $this->loadModel("LoginManagement");

        if(!empty($_POST)) {
            if(!$this->LoginManagement->exist($_POST['mail'])) {
                echo '<script> alert("Error: You have entered an invalid email address."); location.href="/";</script>';
                exit();
            }

            $wanted = $this->LoginManagement->getPassword($_POST['mail']);
            if (password_verify($_POST['password'], $wanted['User_password'])) {
                header('Location: /home');
                exit();
            } else {
                echo '<script> alert("Error: You have entered an invalid password."); location.href="/";</script>';
            }
        }
        
    }

    public function register() {
        $this->render('register');
    }

    public function getFolder() {
        $folder = explode('\\', __CLASS__);
        return array_pop($folder);
    }

    public function users() {
        $this->loadModel("LoginManagement");
        $list =  $this->LoginManagement->getAll();
        foreach($list as $key => $value) {
            echo "{$key} => {$value} <br/>";
        }
    }

}
