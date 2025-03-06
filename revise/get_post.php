<?php

$a=$_POST['number'];
$b=33;
$sum=$a*$b;
echo $sum;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="get_post.php" method="post">
        <label>number</label>
        <input type="text" name="number">
        <input type="submit" value="sum">
</form>
<div id="output">
    <h1></h1>
</div>
</body>
</html>