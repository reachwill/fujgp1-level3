<?php

require_once('../dbconfig.php');
$sql = "SELECT * FROM users ORDER BY lastname ASC";
$result = $conn->query($sql);
$rows = array();//creat an empty array
while($row = $result->fetch_assoc()){
    $rows[] = $row;
}

echo json_encode($rows);


?>