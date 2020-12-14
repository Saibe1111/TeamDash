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
