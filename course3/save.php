<?php

$name = $_POST['name'];
$savingsId = $_POST['savingsId'];
$total = $_POST['total'];

$sql = "UPDATE savings SET name='$name', total='$total' WHERE savingsId = $savingsId ";

//connect to database and run update query here..
//eg...
//$conn->query($sql);


echo $sql;

?>