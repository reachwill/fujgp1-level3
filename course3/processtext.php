<?php
require_once('helpers.php');

//variables declarations
$input;//text input from file
$output='';//final output of the process
$name;//name of the user
$dataType;//BASIC or UDATA
$data;//data of the user
$line;//each line in the loop
$modified;//the processed string in the loop
$outputFile;//the final output


//read in a text file to process
$input = fopen("input.txt", "r");

if($input){//text file loaded ok
    
    //loop thru each line in the text file
    while(($line = fgets($input)) !== false){
        
        //reset the modified variable to a blank string
        $modified = '';
        //now get the name value from the line
        $name = between("NAME=", ",", $line);
        //get the dataType
        if(strpos($line,'BASIC')){
            $dataType = '(BASIC)';//set the dataType
            $data = after('BASIC=',$line);//grab the data after BASIC=
        }else{
            $dataType = '(UDATA)';//set the dataType
            $data = after('UDATA=',$line);//grab the data after UDATA=
        }
        
        //add substrings to output
        $output .= $name . "," . $data . $dataType . " \n ";
        
        
    }//end while
    
    
    //view the processed output once the loop has finished
    echo $output;
    
    //now write processed data to a file (end point)
    $outputFile = fopen('output.txt','w');
    fwrite($outputFile,$output);
    
    //close the file streams
    fclose($outputFile);
    fclose($input);
    
    
}else{//text file did not load ok
    echo 'problem loading text file';
}





?>