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

     public function addProject(array $project, int $id){
        $req = $this->_connectDB->prepare('INSERT INTO PROJECT VALUES (:id,:project_name,:id_user,:project_desc)');
        $req->bindValue(':project_name', $project['name']);
        $req->bindValue(':id_user', $id);
        $req->bindValue(':project_desc', $project['description']);
        $req->execute();
     }

     public function addTask(string $task, string $id_project){
        $req = $this->_connectDB->prepare('INSERT INTO TASK VALUES (:id, :task, :id_project)');
        $req->bindValue(':task', $task);
        $req->bindValue(':id_project', $id_project);
        $req->execute();
     }

     public function removeProject(int $id_user, string $id_project){
        $req = $this->_connectDB->prepare('DELETE FROM PROJECT WHERE FK_Project_owner=:id_user AND PK_Project_id=:id_project');
        $req->bindValue(':id_project', $id_project);
        $req->bindValue(':id_user', $id_user);
        $req->execute();
     }

     public function removeTask(string $id_task, string $id_user){
      $req = $this->_connectDB->prepare('DELETE FROM TASK WHERE PK_Task_id=:id_task AND FK_Task_project IN (Select PK_Project_id FROM PROJECT WHERE FK_Project_owner=:id_user)');
      $req->bindValue(':id_task', $id_task);
      $req->bindValue(':id_user', $id_user);
      $req->execute();
   }


}