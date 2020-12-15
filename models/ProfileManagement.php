<?php 

/**
* author: TeamDash
* description: Model for the profile
* see: ../util/Model.php
**/

class ProfileManagement extends Model {

    public function __construct() {
        $this->connect();
    }

    /**
    * get data of user by id
    * @param: $id of user
    * @return: user's data
    */
    public function getData(int $id) {

        $stmt = $this->_connectDB->prepare('SELECT * FROM USER WHERE PK_User_id = :id');

        $stmt->bindValue(':id', $id);
        $result = $stmt->execute();

        return $result->fetchArray();

    }

    /**
    * delete user
    * @param: $id of user
    */
    public function remove(int $id) {

        $stmt = $this->_connectDB->prepare('DELETE FROM USER WHERE PK_User_id = :id');
        $stmt->bindValue(':id', $id);

        $stmt->execute();

    }
}