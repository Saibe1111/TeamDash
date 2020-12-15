<?php

/**
* author: TeamDash
* description: controller for the profile of an user
* see: ../util/Controller.php
**/

namespace Controllers;

class Profile extends \Controller{
    
    public function profile() {

        session_start();

        if (!$_SESSION['user']['id']) {

            header('Location: /');
            exit();

        }

        $this->loadModel("ProfileManagement");

        $data = $this->ProfileManagement->getData($_SESSION['user']['id']);
        $this->render('profile', ['data' => $data]);

    }

    
    public function remove() {
        session_start();

        if (!$_SESSION['user']['id']) {

            header('Location: /');
            exit();

        }

        $this->loadModel("ProfileManagement");
        $this->ProfileManagement->remove($_SESSION['user']['id']);
        
        unset($_SESSION['user']);
        header('Location: /');      
        exit();

    }

    public function getFolder() {
        return;
    }

}