<?php
include("includes/functions.php");
if(!isset($_SESSION['admin_details'])){
  header("Location:adminLogin.php");
}
if(isset($_POST['addCategory'])){
  $cname = $_POST['cname'];
  if(trim($cname) === ''){
    header("Location:categories.php?msg='Category name empty!'");
  }else{
    $query = "INSERT INTO category (cname) VALUES ('$cname')";
    $exec = mysqli_query($connection,$query);
    check_query($exec);
    header("Location:categories.php?msg=Category Inserted");
  }
}

if(isset($_POST['updateCategory'])){
  $cname = $_POST['cname'];
  $id = $_POST['pid'];
  if(trim($cname) === ''){
    header("Location:categories.php?msg='Category name empty!'");
  }else{
    $query = "UPDATE category SET cname = '$cname' WHERE cid = '$id'";
    $exec = mysqli_query($connection,$query);
    check_query($exec);
    header("Location:categories.php?msg=Category Updated");
  }
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
    <!--Custom Stylesheet-->
  <link rel="stylesheet" href="css/style.css">
  <title>Category Page Page</title>
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
          <p class="lead"><a href="dashboard.php">Dashboard</a></p>
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
          <p class="lead"><a href=""><b>Categories</b></a></p>
          <hr>
          <p class="lead"><a href="">Users</a></p>
          <hr>
          <p class="lead"><a href="orders.php">Orders</a></p>
        </div>
      </div>

      <div class="col-lg-9 col-md-12  mt-4 mt-lg-0 mt-md-4 mt-sm-0">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-12">
            <form action="" method="post">
              <div class="form-group">
                <label for="">Category Name</label>
                <input type="text" name="cname" class="form-control" placeholder="Enter category name">
              </div>
              <input type="submit" name="addCategory" value="Add Category" class="btn btn-outline-success">
            </form>
          </div>
          <?php 
          if(isset($_GET['action'])){
              $id = $_GET['id'];
              $query = "SELECT * FROM category WHERE cid = '$id'";
              $exec = mysqli_query($connection,$query);
              $row = mysqli_fetch_assoc($exec);
              $cname = $row['cname'];
              ?>
          <div class="col-lg-6 col-md-6 col-12">
            <form action="" method="post">
              <div class="form-group">
                <label for=""><b>Update Category Name</b></label>
                <input type="text" name="cname" value="<?php echo $cname; ?>" class="form-control" placeholder="Enter category name">
                <input type="hidden" name="pid" value="<?php echo $id; ?>">
              </div>
              <input type="submit" name="updateCategory" value="Update Category" class="btn btn-outline-success">
            </form>
          </div>
          <?php  } ?>
        </div>
        <div class="row mt-4">
          <div class="col-12">
          <?php
          if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            echo "<div class='alert alert-success'>{$msg}</div>";
            echo "<script>
              setInterval(()=>{
                document.querySelector('.alert').style.display = 'none';
              },2000);
            </script>";
          }
          ?>
            <table class="table table-bordered text-center" >
              <thead>
                <tr>
                  <th>Category Id</th>
                  <th>Category Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $query = "SELECT * FROM category";
                $exec = mysqli_query($connection,$query);
                check_query($exec);
                while($row = mysqli_fetch_assoc($exec)){
                  $cat_id = $row['cid'];
                  echo "<tr>";
                  echo "<td>{$row['cid']}</td>";
                  echo "<td>{$row['cname']}</td>";
                  echo "<td><a href='categories.php?action=edit&id={$cat_id}'><i class='fas fa-edit'></i></a></td>";
                  echo "<td><a href='deletecat.php?id={$cat_id}' onclick='return confirm();'><i class='fas fa-trash'></i></a></td>";
                  echo "</tr>";
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
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
</body>
</html>