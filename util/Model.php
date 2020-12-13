<?php 

abstract class Model {

    private $db = "./layout/database.db";
    protected $_connectDB;

    public function connect() {
        $this->_connectDB = NULL;

        try {
            $this->_connectDB = new SQLite3($this->db);
            $request = $this->_connectDB->prepare('PRAGMA foreign_keys = ON');
            $request->execute();

        } catch (Exception $e) {
            echo 'ERROR : ' . $e->getMessage();
        }
    }

}