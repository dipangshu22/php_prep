<?php
$servername="localhost";
$username="root";
$password="";
$database="school";
$conn=mysqli_connect($servername,$username,$password);


$name="ramesh";
$phone=23234444;
$sql="INSERT INTO `school`.`student` (`slno`, `name`, `phone no`) VALUES (NULL, '$name', '$phone')";

$data=mysqli_query($conn,$sql);

if($data){
    echo"data inserted";
}
else{
    echo "data not inserted";
}
?>