<?php

session_start();
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = 'ecommerce';

$connection = mysqli_connect($serverName,$userName,$password,$dbName);
if(!$connection){
  die("Connection failed".mysqli_connect_error());
}

?>