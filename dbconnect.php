<?php 
  
  $host='localhost';
  $username='root';
  $pass='';
  $db='teacher';

  $conn=mysqli_connect($host,$username,$pass,$db);

  if(!$conn) {
    die();
  }
 ?>