<?php

/**
* author: TeamDash
* description: controller for the Board
* see: ../util/Controller.php
**/

namespace Controllers;

class Board extends \Controller {

    public function board() {

        session_start();

        if(!$_SESSION['user']['id']){
            header('Location: /');
            exit();
        }

        $this->loadModel("BoardManagement");
        $project_id = substr($_SERVER['REQUEST_URI'], 7);

        if (!empty($_POST)){
            $this->BoardManagement->addTask($_POST['task'], $project_id);
            header("Refresh:0");
        }

        $board_data = [];
        $board_data['id'] = $project_id;
        $board_data['name'] = $this->BoardManagement->getName($project_id);
        $board_data['task'] = $this->BoardManagement->getTasks($project_id);

        $this->render('board', ['board_data' => $board_data]);

    }

    public function deleteTask() {

        session_start();

        if(!$_SESSION['user']['id']){
            header('Location: /');
            exit();
        }

        $this->loadModel("BoardManagement");

        $str = substr($_SERVER['REQUEST_URI'], 10);
        
        list($id_task, $id_project) = explode('/', $str); 
        $this->BoardManagement->removeTask($id_task);
        
        header('Location: /board/'. $id_project);
        exit();

    }

    public function deleteProject() {

        session_start();

        if(!$_SESSION['user']['id']){
            header('Location: /');
            exit();
        }

        $id_project = substr($_SERVER['REQUEST_URI'], 10);
        $this->loadModel("BoardManagement");

        $this->BoardManagement->remove($id_project);

        header('Location: /home');
        exit();

    }

    public function getFolder() {
        return;
    }
}