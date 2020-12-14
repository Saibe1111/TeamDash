<<<<<<< HEAD
<<<<<<< HEAD
<?php 
namespace Controllers;

class Authentication extends \Controller {
    
    public function login() {
        $this->render('login');

        $this->loadModel("LoginManagement");

        if(!empty($_POST)) {
            if(!$this->LoginManagement->exist($_POST['mail'])) {
                echo '<script> alert("Error: You have entered an invalid email address."); location.href="/";</script>';
                exit();
            }

            $wanted = $this->LoginManagement->getPassword($_POST['mail']);
            if (password_verify($_POST['password'], $wanted['User_password'])) {
                header('Location: /home');
                exit();
            } else {
                echo '<script> alert("Error: You have entered an invalid password."); location.href="/";</script>';
            }
        }
        
    }

    public function register() {
        $this->render('register');
    }

    public function getFolder() {
        $folder = explode('\\', __CLASS__);
        return array_pop($folder);
    }

    public function users() {
        $this->loadModel("LoginManagement");
        $list =  $this->LoginManagement->getAll();
        foreach($list as $key => $value) {
            echo "{$key} => {$value} <br/>";
        }
    }

}
=======
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
>>>>>>> f3d074d296fafc8b50fbae53a16c865488a0c25c
=======
<?php 
namespace Controllers;

class Authentication extends \Controller {

    public function login() {
        $this->render('login');

        if(!empty($_POST)) {
            $this->loadModel("LoginManagement");

            if(!$this->LoginManagement->exist($_POST['mail'])) {
                echo '<script> alert("Error: You have entered an invalid email address."); location.href="/";</script>';
                exit();
            }

            $wanted = $this->LoginManagement->getPassword($_POST['mail']);
            if (password_verify($_POST['password'], $wanted['User_password'])) {
                header('Location: /home');
                exit();
            } else {
                echo '<script> alert("Error: You have entered an invalid password."); location.href="/";</script>';
            }
        }
        
    }

    public function register() {
        $this->render('register');

        if (!empty($_POST)) {
            $this->loadModel("RegisterManagement");
            $user_data = [];
            
            list($firstname, $lastname) = explode(' ', $_POST['name']);
            $user_data['firstname'] = htmlspecialchars($firstname);
            $user_data['lastname'] = htmlspecialchars($lastname);
            $user_data['username'] = htmlspecialchars($_POST['username']);
            $user_data['email'] = htmlspecialchars($_POST['email']);
            $user_data['password'] = htmlspecialchars($_POST['password']);

            if ($this->registerIsValid($user_data)) {
                $user_data['password_hash'] = password_hash($user_data['password'], PASSWORD_BCRYPT, ['cost' => 12]);
                $this->RegisterManagement->addUser($user_data);

                header('Location: /');
            }
                        
        }

    }

    public function getFolder() {
        $folder = explode('\\', __CLASS__);
        return array_pop($folder);
    }

    public function users() {
        $this->loadModel("RegisterManagement");
        $list =  $this->RegisterManagement->removeAll();
    }

    private function registerIsValid(array $data) {
        $valid = TRUE;
        
        if ($this->RegisterManagement->usernameIsUse($data['username'])) {
            echo '<script> alert("Error: Username is already used."); location.href="/register";</script>';
            return !$valid;
        } 

        if ($this->RegisterManagement->emailIsUse($data['email'])) {
            echo '<script> alert("Error: Email address is already used."); location.href="/register";</script>';
            return !$valid;
        }

        if(!$this->pwdIsValid($data['password'])) {
            echo '<script> alert("Error: Password must contain an uppercase letter, a lowercase letter, one number and a special character (min. lenght: 8 characters)."); location.href="/register";</script>';
            return !$valid;
        }

        return $valid;
    }

    private const MIN_LENGHT = 8;
    private const UPPERCASE = '/[A-Z]/';
    private const LOWERCASE = '/[a-z]/';
    private const SPECIAL = '/[!@#$%^&*]/';
    private function pwdIsValid(string $pwd) {
        $valid = TRUE;
    
        if (strlen($pwd) < Authentication::MIN_LENGHT) {
            return !$valid;
        }

        if(preg_match(Authentication::UPPERCASE, $pwd) == 0) {
            return !$valid;
        }

        if (preg_match(Authentication::LOWERCASE, $pwd) == 0) {
            return !$valid;
        }

        if (preg_match(Authentication::SPECIAL, $pwd) == 0) {
            return !$valid;
        }


        return $valid;
    }
}
>>>>>>> register
