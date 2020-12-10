<?php
class Board extends Controller{
    
    public function index(){
        session_start();
        $this->loadModel("BoardModel");
        if($_SESSION['id']){
            $projectForUser = $this->BoardModel->getUserProject($_SESSION['id']);
        }
        $this->render('index', ['test' => $projectForUser]);
        
        if($_POST['project_name'] !== '' and  isset($_SESSION['id'])  ){
           $this->BoardModel->addProject($_POST['project_name'],$_POST['project_desc'],$_SESSION['id']);
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
    }

    public function delete_project($id){
        session_start();
        $this->loadModel("BoardModel");
        $this->BoardModel->removeProject( $_SESSION['id'], intval($id));
        header('Location: /board');
        exit();
    }

}