<div class="row mb-2">
  <div class="col-lg-6">
    <input type="text" id="searchByCategory" placeholder="Search By Category" class="form-control">
  </div>
  <div class="col-lg-6">
    <input type="text" id="searchByName" placeholder="Search By Name" class="form-control">
  </div>
</div>
      
<div class="table-responsive">
<table class="table table-striped ">
  <thead class="bg-success text-white">
    <tr>
      <th>Product Id</th>
      <th>Product Image</th>
      <th>Product Name</th>
      <th>Product Category</th>
      <th>product Description</th>
      <th>Product price</th>
      <th>Product Quantity</th>
      <th>Product Status</th>
      <th>Edit Product</th>
    </tr>
  </thead>
  <tbody id="tbody">
    <?php  
      $query2 = "SELECT * FROM products";
      $exec2 = mysqli_query($connection,$query2);
      check_query($exec2);
      while($row2 = mysqli_fetch_assoc($exec2)){
        $id = $row2['pid'];
        ?>
          <tr>
            <td><?php echo $row2['pid']; ?></td>
            <td><img src="../prod_pics/<?php echo $row2['pimage'] ?>" class="img-fluid" style="width:140px;" alt=""></td>
            <td><?php echo $row2['pname']; ?></td>
            <td>
              <?php $p_catid = $row2['pcategory'];
                  $query = "SELECT cname FROM category WHERE cid = '$p_catid'";
                  $exec = mysqli_query($connection,$query);
                  check_query($exec);
                  $row1 = mysqli_fetch_assoc($exec);
                  $cname = $row1['cname'];
                  echo $cname;
              ?>
            </td>
            <td><?php echo $row2['pdesc']; ?></td>
            <td><?php echo $row2['pprice']; ?></td>
            <td><?php echo $row2['pqty']; ?></td>
            <td>
              <?php
                if($row2['pqty'] > 0){
                  echo "<span class='badge badge-success'>Available</span>";
                }else{
                  echo "<span class='badge badge-danger'>OUT OF STOCK</span>";
                }
              ?>
            </td>
            <td><a href="products.php?editProduct&id=<?php echo $id; ?>"><i class="fas fa-edit"></i></a></td>
          </tr>
        <?php
      }
    ?>
  </tbody>

</table>
</div>