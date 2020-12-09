<?php
class AuthenticationModel extends Model{
    public function __construct(){
        $this->getConnection();
    }

    public function adduser(string $firstname,string $lastname, string $username, string $mail, string $password ){
        $req = $this->_connectDB->prepare('INSERT INTO USER VALUES (:id,:mail,:pass,:firstname,:lastname,:username)');
        $req->bindValue(':mail', $mail);
        $req->bindValue(':pass', $password);
        $req->bindValue(':firstname', $firstname);
        $req->bindValue(':lastname', $lastname);
        $req->bindValue(':username', $username);
        $req->execute();
     }

     public function getpassword(string $username){
        $req = $this->_connectDB->prepare('SELECT * FROM USER where User_Username=:username');
        $req->bindValue(':username', $username);
        $res = $req->execute();
        return $res->fetchArray();
    }

}