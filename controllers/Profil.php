<?php
class Profil extends Controller{
    
    public function index(){
        session_start();
        $this->loadModel("ProfilModel");
        $userInfo = $this->ProfilModel->getUserInfo($_SESSION['user']['id']);
        $this->render('index', ['userInfo' => $userInfo]);
    }
}