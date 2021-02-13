<div class="table-responsive">
<table class="table text-center">
  <thead class="bg-primary text-white">
    <tr>
      <th>Name</th>
      <th>Picture</th>
      <th>Email</th>
      <th>Address</th>
      <th>Mobile</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $getAllUsers = "SELECT * FROM users";
      $exec_users = mysqli_query($connection,$getAllUsers);
      check_query($exec_users);
      while($row4 = mysqli_fetch_assoc($exec_users)){
        ?>
        <tr>
          <td><?php echo $row4['name']; ?></td>
          <td><img src="../images/<?php echo $row4['ppic']; ?>" style="width:150px;" class="img-fluid" alt=""></td>
          <td><?php echo $row4['email']; ?></td>
          <td><?php echo $row4['address']; ?></td>
          <td><?php echo $row4['phone']; ?></td>
          <td><a href="#"><i class="fas fa-trash"></i></a></td>
        </tr>
        <?php
      }
    ?>
  </tbody>
</table>
</div>