<?php 

/**
* author: TeamDash
* description: Model for the login
* see: ../util/Model.php
**/

class LoginManagement extends Model {

    public function __construct() {
        $this->connect();
    }

    /**
     * check if the mail is known by our database
     * @param: $mail to check
     * @return: bool
     */
    public function exist(string $mail) {

        $stmt = $this->_connectDB->prepare('SELECT * FROM USER WHERE User_mail = :mail');
        $stmt->bindValue(':mail', $mail);

        $result = $stmt->execute();
        $result = $result->fetchArray();

        return !empty($result);

    }

    /**
    * get the password by mail
    * @param: $mail
    * @return: hash password
    */
    public function getPassword(string $mail) {

        $stmt = $this->_connectDB->prepare('SELECT User_password FROM USER where User_mail = :mail');
        $stmt->bindValue(':mail', $mail);

        $password = $stmt->execute();
        
        return $password->fetchArray();

    }

}