<?php
require_once('function/manage.php');
$idd=$_GET['d'];
$del="DELETE FROM user_cr  WHERE id='$idd'";
if(mysqli_query($con,$del)){
  header('Location:all-user.php');
}else {
  header('Location:all-user.php');
}
 ?>
