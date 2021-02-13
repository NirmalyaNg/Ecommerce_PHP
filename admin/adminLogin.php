<?php ob_start(); ?>
<?php
include("../includes/connection.php");
if(isset($_POST['login'])){
  $email = mysqli_real_escape_string($connection,$_POST['email']);
  $pass = mysqli_real_escape_string($connection,$_POST['pass']);

  if(trim($email) === "" || trim($pass) === ""){
    header("Location:adminLlogin.php?msg=Fields cannot be empty&alert=warning");
  }
  else{
    $query = "SELECT * FROM admin WHERE email = '$email'";
    $get_admin_details = mysqli_query($connection,$query);

    if(mysqli_num_rows($get_admin_details) === 1){
      $row = mysqli_fetch_assoc($get_admin_details);
      if($row['password'] === $pass){
        $_SESSION['admin_details'] = $row; 
        header("Location:dashboard.php");
      }
      else{
        header("Location:adminLogin.php?msg=Wrong Credentials&alert=danger");
      }
    }
    else{
      header("Location:adminLogin.php?msg=User not registered.&alert=warning");
    }
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

    <!--Ekko Lightbox Cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <!--Custom Stylesheet-->
  <link rel="stylesheet" href="css/style.css">
  <title>Admin Login Page</title>
</head>
<body>
<section id="login-form" class="mt-5 pt-4">
  <div class="container">
  <h1 class="display-4 text-center">ADMIN Login</h1>
    <div class="col-md-8 offset-md-2 col-lg-6 offset-lg-3">
    <?php if(isset($_GET['msg']))
    { 
      $msg = $_GET['msg'];
      $alert = $_GET['alert'];
      echo "<div class='alert alert-{$alert}'>{$msg}</div>";  
    } ?>
      <form method="POST">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" id="email"  required class="form-control" name="email" autocomplete="off">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" name="pass" required class="form-control" id="password" autocomplete="off">
        </div>
        <input type="submit" class="btn btn-primary btn-block" name="login" value="Login">
      </form>
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