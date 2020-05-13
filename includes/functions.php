<?php
include("connection.php");
function check_query($query){
  global $connection;
  if(!$query){
    die("Query failed".mysqli_error($connection));
  }
}

?>