<?php

//connect to database - tyhis requires that we create an instance of the mysqli class. The mysqli class constructor requires arguments. (database server,username,password,database name)
$conn = new mysqli('localhost','classicmodels','password','classicmodels');


//always important to check for errors
if($conn->connect_errno){
    echo 'Connection error: ' . $conn->connect_errno;
    exit();
}


//select all the customers from the database
$sql = "SELECT customerNumber, customerName FROM customers";

//next line tries to create a variable ($result) but if it is false we have an error which we must deal with - note the exclamation mark with is checking for false.
if(!$result = $conn->query($sql)){
    echo $conn->error;
}


//check if it works
//var_dump($result->fetch_array());

//create an array for the results
$customers = array();
//loop thru the results and push each result into the $customers array - repetition
while($row = $result->fetch_array()){
    array_push($customers,$row);
}

echo json_encode($customers);





?>








