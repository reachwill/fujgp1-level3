<?php

//connect to the DB
//'localhost','super-user-name','password','database-name'
$conn = new mysqli('localhost','fuj-php','password','fuj-php');
//check if connection to DB was successful
if($conn->connect_errno){
    echo $conn->connect_errno;
    echo $conn->connect_error;
    exit();  
}

?>