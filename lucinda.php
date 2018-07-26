<?php

$str = 'uploads/fire.jpg,uploads/img2.jpg,uploads/img3.jpg';

$imgArray = explode(',',$str);
var_dump($imgArray);

for($i=0;$i<count($imgArray);$i++){
    echo $imgArray[$i] . '<br>';
}

?>