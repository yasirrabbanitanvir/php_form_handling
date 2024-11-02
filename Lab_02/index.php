<?php include_once("action.php") ?>

<form action="" method="get">

<input type="text" name='n[]'>
<input type="text" name='n[]'>
<input type="text" name='n[]'>
<input type="text" name='n[]'>
<input type="submit" name='btn' value='ADD' >

<p>The total is: </p> <?php echo $sum;  ?>


</form>