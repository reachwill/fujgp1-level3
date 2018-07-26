<?php
require_once('helpers.php');
$output = "";

$handle = fopen("input.txt", "r");

if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
        //echo $line . "<br>";
        $newline = "";      
        $uon = between("NAME=", ",", $line);
        $newline .= $uon . ",";
        
        if(strpos($line,"BASIC")){
            $data = after("BASIC=",$line);
            $newline .= $data . "(BASIC)";
        }else{
            $data = after("UDATA=",$line);
            $newline .= $data . "(UDATA)";
        }
        echo $newline . "<br>";
        $output .= $newline . " \n";
    }
    
    echo "-----------------------------";
    //echo $output;
    
    //write the output file
    $myfile = fopen("output.txt", "w") or die("Unable to open file!");
    fwrite($myfile, $output);
    fclose($myfile);
    
    
    

    fclose($handle);
} else {
    // error opening the file.
    echo "error opening file";
}



?>