<?php 
include("includes/functions.php");
if(isset($_GET['orderid'])){
  $orderid = $_GET['orderid'];

  $query = "UPDATE orders SET Order_status = 'Shipped' WHERE orderid = '$orderid'";
  $exec = mysqli_query($connection,$query);
  check_query($exec);
  header("Location:orders.php");
}
?>