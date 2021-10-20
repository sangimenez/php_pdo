<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'Config.php';
include_once 'Data.php';

//get database connection
$database = new Config();

$db = $database->getConnection();

$user = new Data($db);

$user->id = isset($_GET['id']) ? $_GET['id'] : die('You must put ID'); 

//delete user
if ($user->delete()) {
    echo "<script>location.href='index.php'</script>";
}
else {
    echo "<script>alert('Failed to Deleted User')</script>";
}
    