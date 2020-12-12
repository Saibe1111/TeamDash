<?php
class Authentication extends Controller{
    
    public function index(){
        header('Location: /authentication/login');
        exit();
    }

    public function login(){
        session_start();

        $this->loadModel("AuthenticationModel");
        $this->render('login');

        //get values
        $user = [];

        //define
        $user['username'] = htmlspecialchars($_POST['username']);
        $user['password'] = htmlspecialchars($_POST['password']);

        if(loginCheck($user)){
            $res =$this->AuthenticationModel->getpassword($user['username']);
            if (password_verify($user['password'], $res['User_password'])) {
                $_SESSION['user']['id'] = $this->AuthenticationModel->getId($user['username'])["PK_User_id"]; 
                header('Location: /board');
                exit();
            }else{
                $_SESSION['ERROR'][] = 'Invalid password';
            }
        }
        foreach ($_SESSION['ERROR'] as $e) {
            echo ($e . '<br>');
            unset($_SESSION['ERROR']);
        }
    }

    public function register(){
        session_start();

        $this->loadModel("AuthenticationModel");
        $this->render('register');

        //get values
        $user = [];

        //define
        $user['firstname'] = htmlspecialchars($_POST['firstname']);
        $user['lastname'] = htmlspecialchars($_POST['lastname']);
        $user['username'] = htmlspecialchars($_POST['username']);
        $user['email'] = htmlspecialchars($_POST['email']);
        $user['password'] = htmlspecialchars($_POST['password1']);
        $user['verify password'] = htmlspecialchars($_POST['password2']);

        if(registerCheck($user)){
            //Generation of an unreadable password 
            $user['hash'] = password_hash($user['password'], PASSWORD_BCRYPT, ['cost' => 12]);
            //Send data to the model
            $this->AuthenticationModel->adduser($user);
        }
        
        foreach ($_SESSION['ERROR'] as $e) {
            echo ($e . '<br>');
            unset($_SESSION['ERROR']);
        }

    }   

    public function logout(){
        session_start();
        unset($_SESSION['user']['id']);
        header('Location: /authentication/login');
        exit();
    }
}


//Check 
function registerCheck(array $user){

    $check = true;

    //Check Empty
    foreach ($user as $key => $value) {
        if($value == NULL){
            $_SESSION['ERROR'][] = 'Invalid ' . $key;
            $check = false;
        }
    }

    //Verify password
    if($user['password'] !== $user['verify password']){
        $_SESSION['ERROR'][] = 'Invalid verify password';
        $check = false;
    }

    return $check;
}

//Check 
function loginCheck(array $user){

    $check = true;

    //Check Empty
    foreach ($user as $key => $value) {
        if($value == NULL){
            $_SESSION['ERROR'][] = 'Invalid ' . $key;
            $check = false;
        }
    }

    return $check;
}