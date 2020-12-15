<?php 

/**
* author: TeamDash
* description: Model for the Home
* see: ../util/Model.php
**/

class HomeManagement extends Model {

    public function __construct() {
        $this->connect();
    }

    /**
    * get user's projects by id
    * @param: $id - user id
    * @return: array containing the projects
    */
    public function getProjects(int $id) {

        $stmt = $this->_connectDB->prepare('SELECT * FROM PROJECT where FK_Project_owner=:id');
        $stmt->bindValue(':id', $id);
        $result = $stmt->execute();

        $result_array = [];
        while ($row = $result->fetchArray()) {
            $result_array[] = $row;
        }
        
        return $result_array;

    }

    /**
    * add a new project for a user
    * @param: $data - project's data
    * @param: $id - user's id
    */
    public function addProject(array $data, int $id) {

        $stmt = $this->_connectDB->prepare('INSERT INTO PROJECT VALUES (:id,:project_name,:id_user,:project_description)');

        $stmt->bindValue(':project_name', $data['name']);
        $stmt->bindValue(':id_user', $id);
        $stmt->bindValue(':project_description', $data['description']);

        $stmt->execute();

    }

}