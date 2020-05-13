<?php
include("includes/connection.php");
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

    <!--Ekko Lightbox Cdn-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.css">
    <!--Custom Stylesheet-->
  <link rel="stylesheet" href="css/style.css">
  <title>Bootstrap Theme</title>
</head>

<body>
 
  <!--Navigation Bar-->
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <div class="container">
    <a href="index.html" class="navbar-brand">ESTORE</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a href="index.php" class="nav-link pl-md-4">HOME</a>
        </li>
        <li class="nav-item ">
          <a href="about.php" class="nav-link pl-md-4">ABOUT US</a>
        </li>
        <!-- <li class="nav-item ">
          <a href="#" class="nav-link pl-md-4">SERVICES</a>
        </li>
        <li class="nav-item ">
          <a href="#" class="nav-link pl-md-4">BLOG</a>
        </li> -->
        <?php if(isset($_SESSION['user_details'])) {
          echo"<li class='nav-item'><a href='profile.php' class='nav-link pl-md-4'>PROFILE</a></li>";
          echo"<li class='nav-item'><a href='shop.php' class='nav-link pl-md-4'>SHOP</a></li>";
        } else{
          echo"<li class='nav-item'><a href='profile.php' class='nav-link pl-md-4'>LOGIN</a></li>";
        } ?>
        <li class="nav-item">
          <a href="signup.php" class="nav-link pl-md-4">SIGNUP</a>
        </li>
        <li class="nav-item ">
          <a href="contact.php" class="nav-link pl-md-4">CONTACT US</a>
        </li>
        <?php if(isset($_SESSION['user_details'])){
          echo "<li class='nav-item'><a href='logout.php' class='nav-link pl-md-4'>LOGOUT</a></li>";
        } ?>
      </ul>
    </div>
  </div>
</nav>

<!--Showcase Section-->
<section id="showCase" class="mt-5">
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <!--First Carousel Item-->
      <div class="carousel-item carousel-image-1 active">
        <div class="container">
          <div class="carousel-caption d-none d-sm-block text-right mb-5">
            <h1 class="display-3">Heading One</h1>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. At harum distinctio illo id praesentium quaerat tempora expedita amet aliquid consectetur.</p>
            <a href="#" class="btn btn-danger btn-lg">Sign Up Now</a>
          </div>
        </div>
      </div>

      <!--Second Carousel Item-->
      <div class="carousel-item carousel-image-2">
        <div class="container">
          <div class="carousel-caption d-none d-sm-block mb-5">
            <h1 class="display-3">Heading Two</h1>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. At harum distinctio illo id praesentium quaerat tempora expedita amet aliquid consectetur.</p>
            <a href="#" class="btn btn-primary btn-lg">Learn more</a>
          </div>
        </div>
      </div>

      <!--Third Carousel Item-->
      <div class="carousel-item carousel-image-3">
        <div class="container">
          <div class="carousel-caption d-none d-sm-block text-right mb-5">
            <h1 class="display-3">Heading Three</h1>
            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. At harum distinctio illo id praesentium quaerat tempora expedita amet aliquid consectetur.</p>
            <a href="#" class="btn btn-success btn-lg">Login and Shop</a>
          </div>
        </div>
      </div>
    </div>

    <a href="#myCarousel" data-slide="prev" class="carousel-control-prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a href="#myCarousel" data-slide="next" class="carousel-control-next">
      <span class="carousel-control-next-icon"></span>
    </a>
  </div>
</section>

<!--Home icons section-->
<section class="home-icons py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-4 mb-2 text-center">
        <i class="fas fa-cog fa-3x mb-2"></i>
        <h3>Turning Gears</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores, in.</p>
      </div>
      <div class="col-md-4 mb-2 text-center">
        <i class="fas fa-cloud fa-3x mb-2"></i>
        <h3>Sending Data</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores, in.</p>
      </div>
      <div class="col-md-4 mb-2 text-center">
        <i class="fas fa-cart-plus fa-3x mb-2"></i>
        <h3>Shopping More</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Maiores, in.</p>
      </div>
    </div>
  </div>
</section>


<!--Home Heading Section With Dark Overlay-->
<section id="home-heading" class="py-5">
  <div class="dark-overlay">
    <div class="row">
      <div class="col">
        <div class="container">
          <h1 class="pt-5">Are You Ready To Shop With Us ?</h1>
          <p class="d-none d-md-block">Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores, sint impedit fuga nostrum atque modi quaerat eligendi doloribus quis at.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Info Section-->
<section id="info" class="py-5 ">
  <div class="container">
    <div class="row">
      <div class="col-md-6 align-self-center">
        <h3>About Our Site</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Adipisci, possimus. Quis eos omnis iure rem sint! Nobis ipsam veniam tempora!</p>
        <a href="#" class="btn btn-outline-danger btn-lg">Learn More</a>
      </div>
      <div class="col-md-6">
        <img src="images/laptop.png" alt="" class="img-fluid">
      </div>
    </div>
  </div>
</section>

<!--Video Play section-->
<section id="video-play">
  <div class="dark-overlay">
    <div class="row">
      <div class="col">
        <div class="container p-5">
          <a href="#" class="video" data-toggle="modal" data-target="#videoModal" data-video="https://www.youtube.com/embed/CqlsgjnePmg">
            <i class="fas fa-play fa-3x" style="color:#fff;"></i>
          </a>
          <h1 class="mt-2">See What We Do</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<!--Modal to play the video-->
<div class="modal fade" id="videoModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <button class="close" data-dismiss="modal">
          <span>&times;</span>
        </button>
        <iframe src="" frameborder="0" height="350" width="100%" allowfullscreen></iframe>
      </div>
    </div>
  </div>
</div>

<!--Image Galerry using lightbox-->
<section id="gallery" class="py-5">
  <div class="container">
    <h1 class="text-center">Photo Gallery</h1>
    <p class="text-center">Check out our Product Images</p>
    <!--1st Row-->
    <div class="row mb-4">
      <div class="col-md-4 mb-2">
        <a href="prod_pics/mobile1.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="560" data-width="560">
          <img src="prod_pics/mobile1.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-4 mb-2">
        <a href="prod_pics/mobile2.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="561" data-width="561">
          <img src="prod_pics/mobile2.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-4 mb-2">
        <a href="prod_pics/mobile3.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="562" data-width="562">
          <img src="prod_pics/mobile3.jpg" alt="" class="img-fluid">
        </a>
      </div>
    </div>
    <!--2nd Row-->
    <!-- <div class="row mb-4">
      <div class="col-md-4 mb-2">
        <a href="prod_pics/laptop1.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="563" data-width="563">
          <img src="prod_pics/laptop1.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-4 mb-2">
        <a href="prod_pics/laptop3.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="564" data-width="564">
          <img src="prod_pics/laptop3.jpg" alt="" class="img-fluid">
        </a>
      </div>
      <div class="col-md-4 mb-2">
        <a href="prod_pics/laptop4.jpg" data-toggle="lightbox" data-gallery="img-gallery" data-height="565" data-width="565">
          <img src="prod_pics/laptop4.jpg" alt="" class="img-fluid">
        </a>
      </div>
    </div> -->
  </div>
</section>

<!--NewsLetter Section-->
<section id="newsletter" class="p-5 text-center bg-dark text-white">
  <div class="container">
    <div class="row">
      <div class="col">
        <h1>Sign Up For Our NewsLetter</h1>
        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae placeat fuga illum voluptates aliquam minima laudantium rerum accusantium sapiente quos?</p>
        <form  class="form-inline justify-content-center">
          <input type="text" class="mb-2 mr-2 form-control" placeholder="Enter Name">
          <input type="email" class="mb-2 mr-2 form-control" placeholder="Enter Email">
          <input type="submit" class="btn btn-primary mb-2">
        </form>
      </div>
    </div>
  </div>
</section>

<!--Footer Section-->
<section id="footer" class="p-3 text-center">
  <div class="container">
    <div class="row">
      <div class="col">
        <p>Copyright &copy; <span id="year"></span>  E-Kart</p>
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
    <!--Ekko lightbox Js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js"></script>

    <!-- Get the current year for the copyright -->
  <script>
    $('#year').text(new Date().getFullYear());
  </script>


    <!--Configure carousel slider-->
  <script>
    $('.carousel').carousel({
      interval:6000,
      pause:'hover'
    });
  </script>

  <!--Light box code-->
  <script>
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
  </script>

<!--Video play with autoplay from stack overflow--> 
  <script>
    
    $(function () {
      // Auto play modal video
      $(".video").click(function () {
        var theModal = $(this).data("target"),
          videoSRC = $(this).attr("data-video"),
          videoSRCauto = videoSRC + "?modestbranding=1&rel=0&controls=0&showinfo=0&html5=1&autoplay=1";
        $(theModal + ' iframe').attr('src', videoSRCauto);
        $(theModal + ' button.close').click(function () {
          $(theModal + ' iframe').attr('src', videoSRC);
        });
      });
    });

  </script>
</body>

</html>