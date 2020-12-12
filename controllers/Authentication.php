<?php
class Authentication extends Controller{
    
    public function index(){
        header('Location: /authentication/login');
        exit();
    }

    public function login(){
        session_start();
        $this->loadModel("AuthenticationModel");
        $this->render('login', ['test' => $projectForUser]);

        if(isset($_POST['username'])){
            $res =$this->AuthenticationModel->getpassword($_POST['username']);
            if (password_verify($_POST['password'], $res['User_password'])) {
                echo 'CONNECTED';
                $_SESSION['user']['id'] = 1;
                header('Location: /board');
                exit();
            } else {
                echo 'WRONG USERNAME OR PASSWORD';
            }
        }
    }

    public function register(){
        session_start();
        $this->loadModel("AuthenticationModel");
        $this->render('register', ['test' => $projectForUser]);
        if(isset($_POST['username'])){
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]);
            $this->AuthenticationModel->adduser($_POST['firstname'],$_POST['lastname'],$_POST['username'],$_POST['email'],$password);
        }
    }   

    public function logout(){
        session_start();
        unset($_SESSION['user']['id']);
        header('Location: /authentication/login');
        exit();
    }
}