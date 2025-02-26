<?php

session_start();
if(isset($_SESSION['username'])){
echo "welcome".$_SESSION['username']." this is your favourite category that is: ".$_SESSION['category'];}
else {echo "you are logged out";}
?>