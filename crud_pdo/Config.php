<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Config
 *
 * @author juanjo
 */
class Config {
    //put your code here
    private $host = "localhost";
    private $db_name = "dbpdo";
    private $username = "root";
    private $password = "root";
    
    public $conn;
    
  /*  public function __construct($host,$db_name,$username,$password) {
        $this->host = $host;
        $this->db_name = $db_name;
        $this->username = $username;
        $this->password = $password;
    }*/
    
    public function getConnection(){
        
        $this->conn = NULL;
        
    try{
        $dsn="mysql:host=".$this->host.";dbname=".$this->db_name;
        $this->conn = new PDO($dsn, $this->username, $this->password);
        
    } catch (PDOException $exception) {
        echo "Connection ERROR:".$exception->getMessage();
    }    
        
        return $this->conn;
    }
    
    
}
