<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <form action="http://localhost/prep/update.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control"  name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" name="pass" id="exampleInputPassword1">
  </div>
  
  <button type="submit" class="btn btn-primary">update</button>
</form>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD'] =='POST'){
    $email=$_POST['email'];
    $pass=$_POST['pass'];
  }

$servername="localhost";
$username="root";
$password="";
$database="account";
$conn=mysqli_connect($servername,$username,$password,$database);

$sql=" UPDATE `info` SET `password` = '$pass' WHERE `info`.`email` = '$email'";

$data=mysqli_query($conn,$sql);

if($data){
  echo '<div class="alert alert-success" role="alert">
  "your email '  .$email.  ' and password '.  $pass. ' is submitted"
</div>';
}
else{
  echo '<div class="alert alert-danger" role="alert">
  "your email '  .$email.  ' and password '.  $pass. ' is submitted"
</div>';
}

?>