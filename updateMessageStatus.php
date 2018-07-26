<?php

//store data sent from form (updateMessage.php) in variables for use in SQL statement
$status = $_GET['status'];//select menu
$id = $_GET['messageID'];//hidden field
$email = $_GET['email'];//email field
$message = $_GET['message'];//textarea

require_once('dbconfig.php');
$sql = "UPDATE messages SET status = '".$status."', email='".$email."', message='".$message."' WHERE id=" . $id;

$conn->query($sql);

$conn->close();

header('location:messages.php');

?>