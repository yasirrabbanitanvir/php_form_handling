<?php

if(isset($_GET['btn']) && $_GET['btn']=='ADD')

$n1 = $_GET['a'];
$n2 = $_GET['b'];
$sum = $n1 + $n2;

?>

<form action="" method="get">

<input type="text" name='a'>
<input type="text" name='b'>
<input type="submit" name='btn' value='ADD'>

</form>

<p>The Total is:</p> <?php echo$sum;?>