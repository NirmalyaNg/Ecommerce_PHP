<?php
include("includes/functions.php");
if(isset($_GET['id'])){
  $id = $_GET['id'];
  $query = "DELETE FROM category WHERE cid = '$id'";
  $exec = mysqli_query($connection,$query);
  check_query($exec);
  header("Location:categories.php?msg=DELETE SUCCESSFULL");
}
?>