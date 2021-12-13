<?php
$DB_host='localhost';
$DB_password='';
$DB_name='emon_arc';
$DB_defuser='root';
$con=mysqli_connect($DB_host,$DB_defuser,$DB_password,$DB_name);
if(!$con){
  echo "database connection failed";
}

 ?>
