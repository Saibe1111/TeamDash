<?php
abstract class Model{
    //BD
    private $path = "../Dashtabase.db";
    
    protected $_connectDB;

    public function getConnection(){
        $this->_connectDB = null;
        try{
            $this->_connectDB = new SQLite3($this->path);
        }catch(Exception  $exception){
            echo 'Erreur -> '.$exception->getMessage();
        }

    }


}