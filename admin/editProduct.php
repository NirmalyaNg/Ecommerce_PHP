<?php
  $id = $_GET['id'];
  $select_product = "SELECT * FROM products WHERE pid = '$id'";
  $get_product = mysqli_query($connection,$select_product);
  check_query($get_product);
  $row3 = mysqli_fetch_assoc($get_product);

  // Check if image file is a actual image or fake image
if(isset($_POST["edit"])) {
  // $check = getimagesize($_FILES["ppic"]["tmp_name"]);
  // if($check !== false) {
  //   $uploadOk = 1;
  // } else {
  //   // echo "File is not an image.";
  //   $uploadOk = 0;
  // }
  $target_dir = "../prod_pics/";
  $target_file = $target_dir . basename($_FILES["ppic"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


// Check if file already exists
// if (file_exists($target_file)) {
//   echo "Sorry, file already exists.";
//   $uploadOk = 0;
// }

// Check file size
if ($_FILES["ppic"]["size"] > 600000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  //Since we have not chosen the new image 
   $pname = $_POST['pname'];
    $pdesc = $_POST['pdesc'];
    $pqty = $_POST['pqty'];
    $pprice = $_POST['pprice'];
    $pstatus = $_POST['pstatus'];
    $pcat = $_POST['pcat'];
    $image_name = $_POST['temp_image'];
    $update_product = "UPDATE products SET pname = '$pname', pdesc = '$pdesc' , pqty = '$pqty' ,pprice = '$pprice' , pcategory = '$pcat',pstatus = '$pstatus' , pimage = '$image_name' WHERE pid = '$id'";
    $update_query = mysqli_query($connection,$update_product);
    check_query($update_query);
    header("Location:products.php?viewAllProduct");



} else {
  if (move_uploaded_file($_FILES["ppic"]["tmp_name"], $target_file)) {
    //Get all details from form
    $pname = $_POST['pname'];
    $pdesc = $_POST['pdesc'];
    $pqty = $_POST['pqty'];
    $pprice = $_POST['pprice'];
    $pstatus = $_POST['pstatus'];
    $pcat = $_POST['pcat'];

    //Update pppic in databse 
   $image_name =  $_FILES['ppic']['name'];
   $update_product = "UPDATE products SET pname = '$pname', pdesc = '$pdesc' , pqty = '$pqty' ,pprice = '$pprice' , pcategory = '$pcat',pstatus = '$pstatus' , pimage = '$image_name' WHERE pid = '$id'";
   $update_query = mysqli_query($connection,$update_product);
   check_query($update_query);
   header("Location:products.php?viewAllProduct");
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
}



























?>

<form  method="post" enctype="multipart/form-data">
  <div class="form-group">
    <label for="pname">Product Name</label>
    <input type="hidden" name="temp_image"  value="<?php echo $row3['pimage']; ?>">
    <input type="text" name="pname" class="form-control" value="<?php echo $row3['pname']; ?>" placeholder="Enter Product Name">
  </div>
  <div class="form-group">
    <label for="pcat">Product Category</label>
    <select name="pcat" id="" class="form-control">
      <?php  
        $get_categories = "SELECT * FROM category";
        $execute = mysqli_query($connection,$get_categories);
        check_query($execute);
        while($rowofcat = mysqli_fetch_assoc($execute)){
          if($rowofcat['cid'] == $row3['pcategory']){
            ?>
              <option value="<?php echo $row3['pcategory'] ?>" selected><?php echo $rowofcat['cname']; ?></option>
            <?php
          }else{ ?>
            <option value="<?php echo $rowofcat['cid']; ?>"><?php echo $rowofcat['cname']; ?></option>
          <?php
          }
          
        }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="pdesc">Product Description</label>
    <textarea name="pdesc" id="pdesc" class="form-control"  placeholder="Enter product description" style="resize:none;"><?php echo $row3['pdesc']; ?>
    </textarea>
  </div>
  <div class="form-group">
    <label for="pprice">Product Price</label>
    <input type="text" name="pprice" class="form-control" value="<?php echo $row3['pprice']; ?>" placeholder="Enter Product Price">
  </div>
  <div class="form-group">
    <label for="pqty">Product Quantity</label>
    <input type="text" name="pqty" class="form-control" value="<?php echo $row3['pqty']; ?>" placeholder="Enter Product Quantity">
  </div>
  <div class="form-group">
    <label for="pstatus">Product Status</label>
    <input type="text" name="pstatus" class="form-control"value='<?php echo $row3['pstatus']; ?>' placeholder="Enter 1 or 0">
  </div>
  <div class="form-group">
    <label for="pimage">Product Image</label>

    <p><img src="../prod_pics/<?php echo $row3['pimage']; ?>" alt="" style="width:120px;" class="img-fluid"></p>
    <input type="file" name="ppic" id="fileToUpload" class="form-control">
  </div>
  <p class="m-auto"><input type="submit" value="Edit Product" name="edit" class="btn btn-primary"></p>
</form>