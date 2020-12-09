<?php
class Board extends Controller{
    
    public function index(){
        session_start();
        $this->loadModel("BoardModel");
        if($_SESSION['id']){
            $projectForUser = $this->BoardModel->getUserProject($_SESSION['id']);
        }
        $this->render('index', ['test' => $projectForUser]);
    }

    public function tasks($id){
        session_start();
        $this->loadModel("BoardModel");
        $Tasks = $this->BoardModel->getTask($id);
        $Name = $this->BoardModel->getProjectName($id);
        $info = [];
        $info['Name'] = $Name;
        $info['Tasks'] = $Tasks;
        $this->render('task', ['test' => $info]);
    }
}