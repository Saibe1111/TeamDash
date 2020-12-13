<?php
class Board extends Controller{
    
    public function index(){

        session_start();

        //check if user is login
        if(!$_SESSION['user']['id']){
            header('Location: /authentication/login');
            exit();
        }

        //Load model
        $this->loadModel("BoardModel");

        if (!empty($_POST)){

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
       
        //get project
        $projectsForUser = $this->BoardModel->getUserProject($_SESSION['user']['id']);

        $this->render('index', ['projectsForUser' => $projectsForUser]);

    }

    public function tasks($id){
        session_start();

        //check if user is login
        if(!$_SESSION['user']['id']){
            header('Location: /authentication/login');
            exit();
        }

        //Load model
        $this->loadModel("BoardModel");

        if (!empty($_POST)){

            //get values
            $newTask = [];

            //define
            $newTask['name'] = htmlspecialchars($_POST['task']);
            if(EmptyCheck($newTask,'task')){
                $this->BoardModel->addTask($newTask['name'],$id);
                header("Refresh:0");
            }
        }

        $Tasks = $this->BoardModel->getTask($id);
        $Name = $this->BoardModel->getProjectName($id);
        $info = [];
        $info['Name'] = $Name;
        $info['id'] = $id;
        $info['Tasks'] = $Tasks;
        $this->render('task', ['test' => $info]);

    }


    //Remove project
    public function delete_project($id){
        session_start();

        $this->loadModel("BoardModel");

        $this->BoardModel->removeProject( $_SESSION['user']['id'], intval($id));

        header('Location: /board');
        exit();
    }

    //Remove task
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