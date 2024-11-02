<?php

$sum = 0;
$x=$_GET['n'];
for($i = 0; $i < count($x); ++$i){
    $sum += $x[$i];
}

?>