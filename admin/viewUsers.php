<table class="table table-bordered text-center">
  <thead class="thead-light">
    <tr>
      <th>User Name</th>
      <th>Profile Picture</th>
      <th>User Email</th>
      <th>User Address</th>
      <th>Mobile Number</th>
      <th>Delete User</th>
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