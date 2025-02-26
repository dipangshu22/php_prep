<?php
//to open a file
//$a=readfile("hello.txt");

$b=fopen('hello.txt','r');
if(!$b){
    echo"file not opened";
}
$content=fread($b,filesize('hello.txt'));
fclose($b);
echo $content;
?>