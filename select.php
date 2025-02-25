<?php
$servername="localhost";
$username="root";
$password="";
$database="account";

$conn=mysqli_connect($servername,$username,$password,$database);
$select="SELECT * FROM `info`";
$data=mysqli_query($conn,$select);
$num= mysqli_num_rows($data);


$no=1;
if($num>0){

    while ($row=mysqli_fetch_assoc($data)) {
        echo $no." " .$row['email']." ".$row['password'];
        echo"<br>";
        $no=$no+1;
        
    }
}

?>