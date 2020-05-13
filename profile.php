<?php include("includes/functions.php");
if(!isset($_SESSION['user_details']))
{
  header("Location:login.php");
}

$email = $_SESSION['user_details']['email'];
$get_user_cart_items = "SELECT * FROM cartitems WHERE user_email = '$email' ";
$exec_query = mysqli_query($connection,$get_user_cart_items);
check_query($exec_query);

$count = mysqli_num_rows($exec_query);
if($count > 0){
$i = 0;
while($row = mysqli_fetch_assoc($exec_query)){
  $_SESSION['cart'][$i]['pid'] = $row['pid'];
  $_SESSION['cart'][$i]['pname'] = $row['pname'];
  $_SESSION['cart'][$i]['pprice'] = $row['pprice'];
  $_SESSION['cart'][$i]['ppic'] = $row['ppic'];
  $_SESSION['cart'][$i]['pqty'] = $row['pqty'];
  
  $i++;
}

}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <!--Font Awesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
    <!--Bootstrap CDN-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">

  <link rel="stylesheet" href="css/style.css">
  <title>Profile Page</title>
  <style>
    .border-bottom{
      border-bottom:1px solid black;
      padding-bottom:5px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
  <div class="container">
    <a href="index.html" class="navbar-brand">ESTORE</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a href="index.php" class="nav-link pl-md-4">HOME</a>
        </li>
        <li class="nav-item ">
          <a href="about.php" class="nav-link pl-md-4">ABOUT US</a>
        </li>
        <li class="nav-item ">
          <a href="contact.php" class="nav-link pl-md-4">CONTACT US</a>
        </li>
        <!-- <li class="nav-item ">
          <a href="#" class="nav-link pl-md-4">SERVICES</a>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link pl-md-4">BLOG</a>
        </li> -->
        <?php if(isset($_SESSION['user_details'])) {
          $email = $_SESSION['user_details']['email'];
          $query = "SELECT * FROM orders WHERE cust_email = '$email' ";
          $exec = mysqli_query($connection,$query);
          if(mysqli_num_rows($exec) >= 1){
            echo "<li class='nav-item' ><a href='myorders.php' class='nav-link pl-md-4'>MYORDERS</a></li>";
          }
          echo"<li class='nav-item active'><a href='profile.php' class='nav-link pl-md-4'>PROFILE</a></li>";
          ?>
        <li class="nav-item">
          <a href="shop.php" class="nav-link pl-md-4">SHOP</a>
        </li>
        <li class="nav-item ">
          <a href="logout.php" class="nav-link pl-md-4">LOGOUT</a>
        </li>

          <?php
        } ?>
      </ul>
    </div>
  </div>
</nav>


<section id="profile" class="mt-5 py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3 col-lg-6 offset-lg-3 text-center ">
        <h3 class="display-4">PROFILE</h3>
        <hr>
        <img src="images/<?php echo $_SESSION['user_details']['ppic']; ?>" alt="" class="img-fluid" style="width:150px;"> 
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-md-6 offset-md-3 col-lg-4 offset-lg-4 ">
        <p ><b>Full Name</b></p>
        <p class="lead border-bottom"><b><?php echo $_SESSION['user_details']['name']; ?></b></p>
        <p ><b>Email</b></p>
        <p class="lead border-bottom mb-3"><b><?php echo $_SESSION['user_details']['email']; ?></b></p>
        <a href="edit_profile.php" class="btn btn-outline-danger btn-sm">Edit Profile</a>
        <a href="shop.php" class="btn btn-success btn-sm"> <i class="fas fa-cart-plus"></i> Start Shopping</a>
        <?php 
        if(isset($_SESSION['cart'])){
        if(count($_SESSION['cart']) >=1 ){
          echo "<a class='btn btn-outline-primary btn-sm' href='cart.php'>MY CART</a>";
        }
      }
        ?>
      </div>
    </div>
  </div>
</section>










<!--Bootstrap Js-->
 <script src="js/jquery.js"></script>
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
    crossorigin="anonymous"></script>

    <!-- Get the current year for the copyright -->
  <script>
    $('#year').text(new Date().getFullYear());
  </script>

</body>

</html>