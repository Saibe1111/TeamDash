<?php
class AuthenticationModel extends Model{
    public function __construct(){
        $this->getConnection();
    }

    public function adduser(array $user){
        $req = $this->_connectDB->prepare('INSERT INTO USER VALUES (:id,:mail,:pass,:firstname,:lastname,:username)');
        $req->bindValue(':mail', $user['email']);
        $req->bindValue(':pass', $user['hash']);
        $req->bindValue(':firstname', $user['firstname']);
        $req->bindValue(':lastname', $user['lastname']);
        $req->bindValue(':username', $user['username']);
        $req->execute();
     }

     public function getpassword(string $username){
        $req = $this->_connectDB->prepare('SELECT * FROM USER where User_Username=:username');
        $req->bindValue(':username', $username);
        $res = $req->execute();
        return $res->fetchArray();
    }

    public function getId(string $username){
        $req = $this->_connectDB->prepare('SELECT PK_User_id FROM USER where User_Username=:username');
        $req->bindValue(':username', $username);
        $res = $req->execute();
        return $res->fetchArray();
    }

    public function usernameIsUse(string $username){
        $req = $this->_connectDB->prepare('SELECT COUNT(PK_User_id) FROM USER where User_Username=:username');
        $req->bindValue(':username', $username);
        $res = $req->execute();
        return $res->fetchArray();
    }

    public function mailIsUse(string $mail){
        $req = $this->_connectDB->prepare('SELECT COUNT(PK_User_id) FROM USER where User_mail=:mail');
        $req->bindValue(':mail', $mail);
        $res = $req->execute();
        return $res->fetchArray();
    }

}