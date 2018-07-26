<?php

require_once('dbconfig.php');

$id = $_GET['imageID'];

//now need to delete the chosen user
$sql = "DELETE FROM images WHERE image_id = " . $id;

unlink($_GET['filePath']);

$conn->query($sql);

$conn->close();

//redirect user back to users.php
header('location:images.php');


?>