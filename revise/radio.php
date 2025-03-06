<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="radio.php" method="post">
    <input type="radio" value="rupay" name="card">visa</br>
    <input type="radio" value="mastercard" name="card">mastercard</br>
    <input type="radio" value="rupay" name="card">rupay</br>
<input type="submit" value="submit" name="submit">
    </form>
</body>
</html>


<?php
if(isset($_POST['submit'])){

    $card=$_POST['card'];
    echo $card;

}


?>