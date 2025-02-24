<?php

$servername="localhost";
$username="root";
$password="";

$conn=mysqli_connect($servername,$username,$password);

$sql='CREATE DATABASE SCHOOL1';
$data=mysqli_query($conn,$sql);

if($data){
    echo "database created";

}
else{ echo "Database already exists" .mysqli_error($conn);
}

?>
