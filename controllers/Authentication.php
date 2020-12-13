<?php
class Authentication extends Controller{
    
    public function index(){
        header('Location: /authentication/login');
        exit();
    }

    public function login(){
        session_start();

        //Load model
        $this->loadModel("AuthenticationModel");

        if (!empty($_POST)){

            //get values
            $user = [];

            //define
            $user['username'] = htmlspecialchars($_POST['username']);
            $user['password'] = htmlspecialchars($_POST['password']);

            if(loginCheck($user)){
                $res =$this->AuthenticationModel->getpassword($user['username']);
                if (password_verify($user['password'], $res['User_password'])) {
                    $_SESSION['user']['id'] = $this->AuthenticationModel->getId($user['username'])["PK_User_id"]; 
                    $_SESSION['Flash']['SUCCESS'][] = 'You are logged in';
                    header('Location: /board');
                    exit();
                }else{
                    $_SESSION['Flash']['ERROR'][] = 'Invalid password';
                }
            }

        }

        $this->render('login');

        
        
    }

    public function register(){
        session_start();

        //Load model
        $this->loadModel("AuthenticationModel");

        if (!empty($_POST)){

            //get values
            $user = [];

            //define
            $user['firstname'] = htmlspecialchars($_POST['firstname']);
            $user['lastname'] = htmlspecialchars($_POST['lastname']);
            $user['username'] = htmlspecialchars($_POST['username']);
            $user['email'] = htmlspecialchars($_POST['email']);
            $user['password'] = htmlspecialchars($_POST['password1']);
            $user['verify password'] = htmlspecialchars($_POST['password2']);

            if(registerCheck($user, $this->AuthenticationModel)){
                //Generation of an unreadable password 
                $user['hash'] = password_hash($user['password'], PASSWORD_BCRYPT, ['cost' => 12]);
                
                //Send data to the model
                $this->AuthenticationModel->adduser($user);

                $_SESSION['Flash']['SUCCESS'][] = 'Your account has been created';

                header('Location: /authentication/login');
                exit();
            }

        }

        $this->render('register');

    }   

    public function logout(){
        session_start();
        unset($_SESSION['user']);
        header('Location: /authentication/login');
        exit();
    }
}


//Check 
function registerCheck(array $user, $model){

    $check = true;

    //Check Empty
    foreach ($user as $key => $value) {
        if($value == NULL){
            $_SESSION['Flash']['ERROR'][] = 'Invalid ' . $key;
            $check = false;
        }
    }

    //Verify password
    if($user['password'] !== $user['verify password']){
        $_SESSION['Flash']['ERROR'][] = 'Invalid verify password';
        $check = false;
    }

    //Check if the username is already in use
    $usernameIsUse = $model->usernameIsUse($user['username']);
    if( $usernameIsUse["COUNT(PK_User_id)"] > 0){
        $_SESSION['Flash']['ERROR'][] = 'Username already used';
        $check = false;
    }

    //Check if the email is already in use
    $mailIsUse = $model->mailIsUse($user['email']);
    if( $usernameIsUse["COUNT(PK_User_id)"] > 0){
        $_SESSION['Flash']['ERROR'][] = 'Email already used';
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
            $_SESSION['Flash']['ERROR'][] = 'Invalid ' . $key;
            $check = false;
        }
    }

    return $check;
}