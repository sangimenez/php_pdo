<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Data
 *
 * @author juanjo
 */
class Data {

    //put your code here
    private $conn;
    public $id;
    public $first_name;
    public $last_name;
    public $email_id;
    public $contact_no;

    public function __construct($db) {
        $this->conn = $db;
    }

    function create() {

        $query = "INSERT INTO tbl_users VALUES (?,?,?,?)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->first_name);
        $stmt->bindParam(2, $this->last_name);
        $stmt->bindParam(3, $this->email_id);
        $stmt->bindParam(4, $this->contact_no);

        if ($stmt->execute())
            return true;
        else
            return false;
    }

    function readAll() {

        $sql = "SELECT * FROM tbl_users ORDER BY last_name";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt;
    }

    function readOne() {
        $sql = "SELECT * FROM tbl_users WHERE id = ? ";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->first_name = $row['first_name'];
        $this->last_name = $row['last_name'];
        $this->email_id = $row['email_id'];
        $this->contact_no = $row['contact_no'];
    }

    function update() {
        $query = " UPDATE tbl_users 
            SET 
            first_name = :fn,
            last_name = :ln,
            email_id = :em,
            contact_no = :ct
            WHERE
            id = : id ";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':fn', $this->first_name);
        $stmt->bindParam(':ln', $this->last_name);
        $stmt->bindParam(':em', $this->email_id);
        $stmt->bindParam(':ct', $this->contact_no);
        $stmt->bindParam(':id', $this->id);
        if ($stmt->execute())
            return true;
        else
            return false;
    }
    function delete(){
        $query = " DELETE FROM tbl_users 
            WHERE
            id = ? ";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->id);
        if ($stmt->execute())
            return true;
        else
            return false;
        
        
    }

}
