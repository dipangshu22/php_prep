<?php
$servername="localhost";
$username="root";
$password="";
$database="school";

$conn=mysqli_connect($servername,$username,$password,$database);
$sql='CREATE TABLE `staff` (`slno` INT NOT NULL AUTO_INCREMENT , `name` VARCHAR(11) NOT NULL , `phone no` INT(11) NOT NULL , PRIMARY KEY (`slno`)) ENGINE = InnoDB;';

$data=mysqli_query($conn,$sql);

if($data){
    echo"table created";
}
else{echo"table not created";}

?>