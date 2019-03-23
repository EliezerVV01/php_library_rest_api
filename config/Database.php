<?php

class Database{
    
    //Database params
    private $host='localhost';
    private $db_name='library_db';
    private $user='root';
    private $pass='';
    private $conn;

    /*Database connect; this returns the connection of the database with the previous params or a 
    an error with the description of it*/
    public function connect(){

        $this->conn=null;

        try {

        $this->conn=new PDO('mysql:host=' .$this->host. ';dbname=' .$this->db_name,
                                         $this->user, $this->pass);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $ex) {

            echo 'Database connection error: ' .$ex->getMessage();

        }

        return $this->conn;
    }


}


?>