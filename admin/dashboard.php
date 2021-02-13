<?php
include("../includes/connection.php");
if(!isset($_SESSION['admin_details'])){
  header("Location:adminLogin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Font Awesome CDN-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
    crossorigin="anonymous">
    <!--Bootstrap CDN-->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB"
    crossorigin="anonymous">

    <!--Ekko Lightbox Cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <!--Custom Stylesheet-->
  <link rel="stylesheet" href="css/style.css">
  <title>Admin Dashboard</title>
</head>

<nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <div class="container">
    <a href="#" class="navbar-brand">E-Kart<i class='fas fa-cart-plus '></i></a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarCollapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item"><a href="#" class="nav-link">PROFILE</a></li>
        <li class="nav-item"><a href="logout.php" class="nav-link">LOGOUT</a></li>
      </ul>
    </div>
  </div>
</nav>


<section id="dashboard" class='p-4 mt-4' >
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-12 col-sm-12 bg-light p-4">
        <div class="option-box">
          <p class="lead"><a href="dashboard.php"><b>Dashboard</b></a></p>
          <hr>
          <div class="dropdown" style="margin-bottom:-10px;">
            <button class=" btn btn-default dropdown-toggle bg-light" style="margin-left:-12px;font-weight:300;font-size:18px;" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Products
            </button>
            <div class="dropdown-menu" style="font-size:17px;" aria-labelledby="dropdownMenuButton">
              <a class="dropdown-item" href="products.php?viewAllProduct">View All Products</a>
              <a class="dropdown-item" href="products.php?addProduct">Add Product</a>
            </div>
          </div>
          <hr>
          <p class="lead"><a href="categories.php">Categories</a></p>
          <hr>
          <p class="lead"><a href="products.php?viewAllUsers">Users</a></p>
          <hr>
          <p class="lead"><a href="orders.php">Orders</a></p>
        </div>
      </div>

      <?php
      $query = "SELECT * FROM category";
      $get_categories = mysqli_query($connection,$query);
      $count_categories = mysqli_num_rows($get_categories);
      $query = "SELECT * FROM orders";
      $get_orders = mysqli_query($connection,$query);
      $count_orders = mysqli_num_rows($get_orders);
      $query = "SELECT * FROM users";
      $get_users = mysqli_query($connection,$query);
      $count_users = mysqli_num_rows($get_users);


        ?>
      <div class="col-lg-9 col-md-12  mt-4 mt-lg-0 mt-md-0 mt-sm-0">
        <div class="row mb-3">
          <div class="col-lg-4">
            <div class="card text-center bg-primary text-white mb-3">
              <div class="card-body">
                <h3>Users</h3>
                <h4 class="display-4">
                  <i class="fas fa-users"></i> <span><?php echo $count_users; ?></span>
                </h4>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card text-center bg-warning text-white mb-3">
              <div class="card-body">
                <h3>Orders</h3>
                <h4 class="display-4">
                  <i class="fas fa-cart-plus"></i> <span><?php echo $count_orders; ?></span>
                </h4>
                
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card text-center bg-success text-white mb-3">
              <div class="card-body">
                <h3>Categories</h3>
                <h4 class="display-4">
                  <i class="fas fa-list"></i> <span><?php echo $count_categories; ?></span>
                </h4>
                
              </div>
            </div>
          </div>
        </div>
        <?php include('includes/charts.php') ?>
      </div>
  
    




































  </div>

</section>

















  <!--Bootstrap Js-->
  <script src="js/jquery.js"></script>
    
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
      crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
      crossorigin="anonymous"></script>
</body>
</html>