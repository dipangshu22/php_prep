<?php
//to write in a file
// $data=fopen("hello2.txt",'w');
// fwrite($data,"hello how are you dear,how may i help you today");

   
//to add in a existing file
$data=fopen('hello2.txt','a');
fwrite($data,"this is appended to the file\n");
fclose($data);

?>