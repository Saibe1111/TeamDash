<?php

class RegisterManagement extends Model {

    public function __construct() {
        $this->connect();
    }

    public function addUser(array $user) {
        $stmt = $this->_connectDB->prepare('INSERT INTO USER VALUES(:id, :email, :pwd, :firstname, :lastname, :username)');
        $stmt->bindValue(':email', $user['email']);
        $stmt->bindValue(':pwd', $user['password_hash']);
        $stmt->bindValue(':firstname', $user['firstname']);
        $stmt->bindValue(':lastname', $user['lastname']);
        $stmt->bindValue(':username', $user['username']);
        $stmt->execute();
    }

    public function usernameisUse(string $username) {
        $stmt = $this->_connectDB->prepare('SELECT * FROM USER WHERE User_Username = :username');
        $stmt->bindValue(':username', $username);
        $result = $stmt->execute();
        $result = $result->fetchArray();
        return !empty($result);
    }

    public function emailIsUse(string $mail) {
        $stmt = $this->_connectDB->prepare('SELECT * FROM USER WHERE User_mail = :mail');
        $stmt->bindValue(':mail', $mail);
        $result = $stmt->execute();
        $result = $result->fetchArray();
        return !empty($result);
    }

    public function removeAll() {
        $stmt = $this->_connectDB->prepare('DELETE FROM USER');
        $stmt->execute();       
    }


}