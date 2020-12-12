<?php
class Board extends Controller{
    
    public function index(){
        session_start();
        $this->loadModel("BoardModel");
        if($_SESSION['user']['id']){
            $projectForUser = $this->BoardModel->getUserProject($_SESSION['user']['id']);
        }
        $this->render('index', ['test' => $projectForUser]);
        
        if($_POST['project_name'] !== '' and  isset($_SESSION['user']['id'])  ){
           $this->BoardModel->addProject($_POST['project_name'],$_POST['project_desc'],$_SESSION['user']['id']);
           header("Refresh:0");
        }

    }

    public function tasks($id){
        session_start();
        $this->loadModel("BoardModel");
        $Tasks = $this->BoardModel->getTask($id);
        $Name = $this->BoardModel->getProjectName($id);
        $info = [];
        $info['Name'] = $Name;
        $info['id'] = $id;
        $info['Tasks'] = $Tasks;
        $this->render('task', ['test' => $info]);

        if($_POST['task'] !== '' and  isset($_SESSION['user']['id'])  ){
            $this->BoardModel->addTask($_POST['task'],$id);
            header("Refresh:0");
         }
    }

    public function delete_project($id){
        session_start();
        $this->loadModel("BoardModel");
        $this->BoardModel->removeProject( $_SESSION['user']['id'], intval($id));
        header('Location: /board');
        exit();
    }

    public function delete_task($id, $id2){
        session_start();
        var_dump($id);
        var_dump($id2);
        session_start();
        $this->loadModel("BoardModel");
        $this->BoardModel->removeTask($id, $_SESSION['user']['id']);
        header('Location: /board/tasks/'. $id2);
        exit();
    }

    

}