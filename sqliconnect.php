<?php
$servername='localhost';
$username='root';
$password='';

$conn=mysqli_connect($servername,$username,$password);

if(!$conn){
    echo "connection failed ";}
else{
    echo"connection established!";
}



// echo "connection is established!";




?>