<?php
$host = 'db';
$user = 'root';
$password = 'ssd';
$db = 'TEST';

$conn = new mysqli($host,$user,$password,$db);
if($conn->connect_error){
  echo 'connection failed' . $conn->connect_error;
}
echo 'Succesfully connected to MYSQL';
?>
