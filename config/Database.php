<?php

class Database{
    //database parameteres
    private $host ='localhost:3307';
    private $databUsername ='root';
    private $databasepass ='';
    private $databasename ='summershop';
    private $conn;

    //conncetion

    public function connect(){
        $this->conn = null;
        try{
        $this-> conn = new PDO('mysql:host=' . $this->host . ';dbname=' .$this->databasename , $this->databUsername,$this ->databasepass);
    
        }catch(PDOException $e){
            echo $e->getMessage();
        }
       return $this->conn; 
    }
}




?>