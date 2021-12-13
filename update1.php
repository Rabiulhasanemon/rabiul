<?php

$idd=$_GET['u'];
$upd="UPDATE user_cr SET user_name='Name' WHERE id='$idd'";
if(mysqli_query($con,$upd)){
  $idd=$_POST['id'];
}
 ?>
