<?php
$a=44;
$b=66;

function value($value){
    global $b,$a;//we can assign global value and the value of the original variable will be changed.
    $a=77;
    $b=100;
    $c=200;//here c is local value.
    echo "this is global variable".$b+$a. "<br>";
    echo "this is local variable".$value;


}

echo value(33)."<br>";

echo "<h2>after assigning global value the new value of a is $a </h2>";
?>