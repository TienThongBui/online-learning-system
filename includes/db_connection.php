<?php
  $host = 'localhost';
  $dbname = 'thesis_db';
  $dbusername = 'root';
  $dbpassword = '';
  
  $conn = mysqli_connect($host, $dbusername, $dbpassword, $dbname); 
  if (!$conn) {
    die("Connection failed:" . mysqli_connect_error());
  }
  
?>