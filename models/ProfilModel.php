<?php
class ProfilModel extends Model{

    public function __construct(){
        $this->getConnection();
    }

    public function getUserInfo(string $id){
        $req = $this->_connectDB->prepare('SELECT * FROM USER where PK_User_id=:id');
        $req->bindValue(':id', $id);
        $res = $req->execute();
        return $res->fetchArray();
    }


}