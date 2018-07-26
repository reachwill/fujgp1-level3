<?php

//echo $_GET['email'];

//connect to DB
require_once('dbconfig.php');

//insert user into DB

//create a date stamp of now
$now = date('r');

$sql = "INSERT INTO users (firstname,lastname,email,date_registered) VALUES('$_GET[firstname]','$_GET[lastname]','$_GET[email]','$now')";

$conn->query($sql);

$conn->close();

header('location:users.php');


?>