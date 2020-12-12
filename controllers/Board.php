<?php
class Board extends Controller{
    
    public function index(){

        session_start();

        foreach ($_SESSION['ERROR'] as $e) {
            echo ($e . '<br>');
            unset($_SESSION['ERROR']);
        }
        
        //check if user is login
        if(!$_SESSION['user']['id']){
            header('Location: /authentication/login');
            exit();
        }

        $this->loadModel("BoardModel");
        //get project
        $projectsForUser = $this->BoardModel->getUserProject($_SESSION['user']['id']);

        $this->render('index', ['projectsForUser' => $projectsForUser]);

        var_dump($_POST);
        if (empty($_POST)){
            return;
        }

        //get values
        $project = [];

        //define
        $project['name'] = htmlspecialchars($_POST['project_name']);
        $project['description'] = htmlspecialchars($_POST['project_desc']);

        
        if( EmptyCheck($project, 'project') ){
           $this->BoardModel->addProject($project,$_SESSION['user']['id']);
           header("Refresh:0");
        }

        

    }

    public function tasks($id){
        session_start();

        //check if user is login
        if(!$_SESSION['user']['id']){
            header('Location: /authentication/login');
            exit();
        }

        $this->loadModel("BoardModel");
        $Tasks = $this->BoardModel->getTask($id);
        $Name = $this->BoardModel->getProjectName($id);
        $info = [];
        $info['Name'] = $Name;
        $info['id'] = $id;
        $info['Tasks'] = $Tasks;
        $this->render('task', ['test' => $info]);

        //get values
        $newTask = [];

        //define
        $newTask['name'] = htmlspecialchars($_POST['task']);
        if(EmptyCheck($newTask,'task')){
            $this->BoardModel->addTask($newTask['name'],$id);
            header("Refresh:0");
         }

         foreach ($_SESSION['ERROR'] as $e) {
            echo ($e . '<br>');
            unset($_SESSION['ERROR']);
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

        $this->loadModel("BoardModel");

        $this->BoardModel->removeTask($id, $_SESSION['user']['id']);
        
        header('Location: /board/tasks/'. $id2);
        exit();
    }

    

}

function EmptyCheck(array $array, string $empty){

    $check = true;

    //Check Empty
    foreach ($array as $key => $value) {
        if($value == NULL){
            $_SESSION['ERROR'][] = 'Empty '. $empty. ' ' . $key;
            $check = false;
        }
    }

    return $check;
}