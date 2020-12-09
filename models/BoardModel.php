<?php
class BoardModel extends Model{
    public function __construct(){
        $this->getConnection();
    }

    public function getUserProject(int $id){
        $statement = $this->_connectDB->prepare('SELECT * FROM PROJECT where FK_Project_owner=:id');
        $statement->bindValue(':id', $id);
        $res = $statement->execute();
        $resultArray = [];
        while ($row = $res->fetchArray()) {
            $resultArray[] = $row;
        }
        return $resultArray;
     }


     public function getTask(int $id){
        $statement = $this->_connectDB->prepare('SELECT * FROM TASK where FK_Task_project=:id');
        $statement->bindValue(':id', $id);
        $res = $statement->execute();
        $resultArray = [];
        while ($row = $res->fetchArray()) {
            $resultArray[] = $row;
        }
        return $resultArray;
     }

     public function getProjectName(int $id){
        $statement = $this->_connectDB->prepare('SELECT Project_name FROM PROJECT where PK_Project_id=:id');
        $statement->bindValue(':id', $id);
        $res = $statement->execute();
        
        return $res->fetchArray();
     }


}