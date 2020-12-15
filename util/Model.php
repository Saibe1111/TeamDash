<?php

/**
* author: TeamDash
**/

abstract class Model {
    
    private $db_path = "../layout/database.db";
    protected $_connectDB;

    //try to connect to the database 
    public function connect() {

        $this->_connectDB = NULL;

        try {

            $this->_connectDB = new SQLite3($this->db_path);

            $stmt = $this->_connectDB->prepare('PRAGMA foreign_keys = ON');
            $stmt->execute();

        } catch(Exception  $e) {
            echo 'Erreur -> '.$e->getMessage();
        }

    }


}