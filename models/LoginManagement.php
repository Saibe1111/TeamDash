<?php 

class LoginManagement extends Model {

    public function __construct() {
        $this->connect();
    }

    public function exist(string $mail) {
        $stmt = $this->_connectDB->prepare('SELECT * FROM USER WHERE User_mail = :mail');
        $stmt->bindValue(':mail', $mail);
        $result = $stmt->execute();
        $result = $result->fetchArray();
        return !empty($result);
    }

    public function getPassword(string $mail) {
        $stmt = $this->_connectDB->prepare('SELECT User_password FROM USER where User_mail = :mail');
        $stmt->bindValue(':mail', $mail);
        $password = $stmt->execute();
        return $password->fetchArray();
    }

    public function getAll() {
        $stmt = $this->_connectDB->prepare('SELECT * FROM USER');
        $result = $stmt->execute();
        return $result->fetchArray();
    }

}