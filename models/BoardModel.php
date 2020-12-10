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

     public function addProject(string $project_name, string $project_desc, int $id){
        $req = $this->_connectDB->prepare('INSERT INTO PROJECT VALUES (:id,:project_name,:id_user,:project_desc)');
        $req->bindValue(':project_name', $project_name);
        $req->bindValue(':id_user', $id);
        $req->bindValue(':project_desc', $project_desc);
        $req->execute();
     }

     public function removeProject(int $id_user, string $id_project){
        var_dump($id_user);
        var_dump($id_project);
        $req = $this->_connectDB->prepare('DELETE FROM PROJECT WHERE FK_Project_owner=:id_user AND PK_Project_id=:id_project');
        $req->bindValue(':id_project', $id_project);
        $req->bindValue(':id_user', $id_user);
        $req->execute();
     }


}