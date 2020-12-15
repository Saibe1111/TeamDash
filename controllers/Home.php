<?php

/**
* author: TeamDash
* description: controller for the Home
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

        $this->loadModel("HomeManagement");
        $user_projects = $this->HomeManagement->getProjects($_SESSION['user']['id']);

        $this->render('home', ['user_projects' => $user_projects]);

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