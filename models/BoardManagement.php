<?php 

/**
* author: TeamDash
* description: Model for the Board
* see: ../util/Model.php
**/

class BoardManagement extends Model {

    public function __construct() {
        $this->connect();
    }

    /**
    * get project name by id
    * @param: $id
    * @return: project name
    */
    public function getName(int $id) {

        $stmt = $this->_connectDB->prepare('SELECT Project_name FROM PROJECT WHERE PK_Project_id = :id');
        $stmt->bindValue(':id', $id);

        $result = $stmt->execute();

        return $result->fetchArray();

    }

    /**
    * get all the tasks of a project thanks to its id
    * @param: $id
    * @return: project's tasks
    */
    public function getTasks(int $id) {
         
        $stmt = $this->_connectDB->prepare('SELECT * FROM TASK WHERE FK_Task_project = :id');
        $stmt->bindValue(':id', $id);

        $result = $stmt->execute();

        $result_array = [];
        while ($row = $result->fetchArray()) {
            $result_array[] = $row;
        }

        return $result_array;

     }

    /**
    * add a new task to the project
    * @param: $task to add
    * @param: $id of the project
    */
    public function addTask(string $task, int $id) {

        $stmt = $this->_connectDB->prepare('INSERT INTO TASK VALUES (:id, :task, :id_project)');

        $stmt->bindValue(':task', $task);
        $stmt->bindValue(':id_project', $id);

        $stmt->execute();

    }

    /**
    * remove one task by id 
    * @param: $task_id
    */
    public function removeTask(int $task_id) {

        $stmt = $this->_connectDB->prepare('DELETE FROM TASK WHERE PK_Task_id = :id_task');
        $stmt->bindValue(':id_task', $task_id);
        
        $stmt->execute();

    }

    /**
    * remove project/board by id
    * @param: $id_project
    */
    public function remove(string $id_project) {

        $stmt = $this->_connectDB->prepare('DELETE FROM PROJECT WHERE PK_Project_id = :id_project');
        $stmt->bindValue(':id_project', $id_project);

        $stmt->execute();

    }

}