<?php

// $dim=array(
//     array(1,3,4,11,13),
//     array(44,77,88,99),
//     array(55,44,8,9)
// );
$dim3=array(
    array(
        array(1,2,3,4),
        array(23,44,55,33),
        array(23,44,55,33),
        array(23,44,55,33),
        array(23,44,55,33)
    ),
    array(
        array(22,3,44,22,22),
        array(34,66,44,33)
    )
    );
//one dimensional:
// for ($i=0; $i <count($dim) ; $i++) { 
//     echo var_dump($dim[$i]);
//     echo "<br>";

// }

//two dimensional:
// for ($i=0; $i <count($dim) ; $i++) { 
//    for ($j=0; $j <count($dim[$i]) ; $j++) { 
//     echo $dim[$i][$j];
//     echo"  ";
//    }
//    echo "<br>";

// }
 //three dimensional:
for ($i=0; $i <count($dim3) ; $i++) { 
    for ($j=0; $j <count($dim3[$i]) ; $j++) { 
        echo"<br>";
     for ($k=0; $k <count($dim3[$i][$j]) ; $k++) { 
        echo $dim3[$i][$j][$k];
        echo "  ";
     }
    }
    
 
 }

?>