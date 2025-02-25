<?php
$servername="localhost";
$username="root";
$password="";
$database="account";

$conn=mysqli_connect($servername,$username,$password,$database);
$sql="SELECT * FROM `info`";
$data=mysqli_query($conn,$sql);
$num= mysqli_num_rows($data);

if($num>0){

    while ($row=mysqli_fetch_assoc($data)) {
        echo $row['slno']."hello" .$row['email']."this is your password".$row['password'];
        echo"<br>";
    }
}

?>