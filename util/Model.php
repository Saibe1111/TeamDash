<?php 

/**
* author: TeamDash
**/

abstract class Model {

    private $db = "./layout/database.db"; // path where is the database used 
    protected $_connectDB; 

    //try to connect to the database    
    public function connect() {

        $this->_connectDB = NULL;

        try {
            $this->_connectDB = new SQLite3($this->db);
            $stmt = $this->_connectDB->prepare('PRAGMA foreign_keys = ON');
            $stmt->execute();
        } catch (Exception $e) {
            echo 'ERROR : ' . $e->getMessage();
        }

    }

}