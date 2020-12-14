<?php

/**
* author: TeamDash
* description: controller for the Board
* see: ../util/Controller.php
**/

namespace Controllers;

class Home extends \Controller {

    public function home() {

        session_start();

        if (!$_SESSION['user']['id']) {

            header('Location: /');
            exit();

        }
        $this->render('home');

        $this->loadModel("HomeManagement");
        
        $user_projects = $this->HomeManagement->getProjects($_SESSION['user']['id']);

        for ($i=0; $i < sizeof($user_projects); ++$i) {
            $_SESSION['user']['id']['project'][$i] =  $user_projects[$i]['name'];
        }
       
        
        
        if (!empty($_POST)) {
            
            $new_project = [];

            $new_project['name'] = htmlspecialchars($_POST['project_name']);
            $new_project['description'] = htmlspecialchars($_POST['project_description']);

            if (!empty($new_project)) {
                $this->HomeManagement->addProject($new_project, $_SESSION['user']['id']);
                header("Refresh:0");
            }
            
        }
    }

    public function getFolder() {
        return;
    }

}