<?php
class Profil extends Controller{
    
    public function index(){
        session_start();
        $this->loadModel("ProfilModel");
        $userInfo = $this->ProfilModel->getUserInfo($_SESSION['user']['id']);
        $this->render('index', ['userInfo' => $userInfo]);
    }

    //Remove project
    public function delete_user($id){
        session_start();

        $this->loadModel("ProfilModel");

        if($_SESSION['user']['id'] === intval($id)){
            $this->ProfilModel->removeUser(intval($id));
            unset($_SESSION['user']);
        }
        $_SESSION['Flash']['SUCCESS'][] = 'Your account has been removed';

        header('Location: /authentication/register');
        exit();
    }
}