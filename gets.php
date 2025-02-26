<?php
$data=fopen('hello.txt','r');
// fgets reads the file line by line
// while($a=fgets($data)){
//     echo $a;
// }

//fgetc reads the line character by character
while($a=fgetc($data)){
    echo $a;  
    if($a=="."){
        break;
    }
}
fclose($data);
?>