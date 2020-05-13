<?php


// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["ppic"]["tmp_name"]);
  if($check !== false) {
    $uploadOk = 1;
  } else {
    // echo "File is not an image.";
    $uploadOk = 0;
  }
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
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
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
   $insert_product = "INSERT INTO products (pname,pcategory,pdesc,pprice,pqty,pstatus,pimage) VALUES('$pname','$pcat','$pdesc','$pprice','$pqty','$pstatus','$image_name')";
   $execute_query = mysqli_query($connection,$insert_product);
   check_query($execute_query);
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
    <input type="text" name="pname" class="form-control" placeholder="Enter Product Name">
  </div>
  <div class="form-group">
    <label for="pcat">Product Category</label>
    <select name="pcat" id="" class="form-control">
      <option selected disabled>--SELECT CATEGORY--</option>
      <?php  
        $get_categories = "SELECT * FROM category";
        $execute = mysqli_query($connection,$get_categories);
        check_query($execute);
        while($rowofcat = mysqli_fetch_assoc($execute)){
          ?>
            <option value="<?php echo $rowofcat['cid']; ?>"><?php echo $rowofcat['cname']; ?></option>
          <?php
        }
      ?>
    </select>
  </div>
  <div class="form-group">
    <label for="pdesc">Product Description</label>
    <textarea name="pdesc" id="pdesc" class="form-control" placeholder="Enter product description" style="resize:none;"></textarea>
  </div>
  <div class="form-group">
    <label for="pprice">Product Price</label>
    <input type="text" name="pprice" class="form-control" placeholder="Enter Product Price">
  </div>
  <div class="form-group">
    <label for="pqty">Product Quantity</label>
    <input type="text" name="pqty" class="form-control" placeholder="Enter Product Quantity">
  </div>
  <div class="form-group">
    <label for="pstatus">Product Status</label>
    <input type="text" name="pstatus" class="form-control" placeholder="Enter 1 or 0">
  </div>
  <div class="form-group">
    <label for="pimage">Product Status</label>
    <input type="file" name="ppic" id="fileToUpload" class="form-control">
  </div>
  <p class="m-auto"><input type="submit" value="Add Product" name="submit" class="btn btn-primary"></p>
</form>