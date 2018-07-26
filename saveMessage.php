<?php

//echo $_GET['email'];

//connect to DB
require_once('dbconfig.php');

//insert user into DB
//create a date stamp of now
$now = date('r');
//store values to save in variables
$email = $_GET['email'];
$message = $_GET['message'];
$category_id = $_GET['categoryID'];
$status = 'pending';

//prepare a parameterised statement - this is a guard against SQL injection and problems with special characters in data submitted from the form
if ( !$stmt = $conn->prepare("INSERT INTO messages (email,message,date,category_id,status) VALUES(?,?,?,?,?)") ) 
    echo "Prepare Error: ($conn->errno) $conn->error";

//bind data from form to the statement
if ( !$stmt->bind_param("sssis", $email,$message,$now,$category_id,$status) )
    echo "Binding Parameter Error: ($conn->errno) $conn->error";

//execute the prepared statement
if ( !$stmt->execute() ) 
echo "Execute Error: ($stmt->errno)  $stmt->error";


$conn->close();

header('location:messages.php');


?>