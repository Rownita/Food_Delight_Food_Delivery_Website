<?php  include("partials/menu.php"); ?>
        <div class="main-content" >
            <div class="wrapper">

                
              <h1>Manage Food Item </h1> 
              <br><br>
              <?php
        if (isset($_SESSION['add'])) { //Checking whether the Session set or not
            echo($_SESSION['add']); //Display the session Message if set
            unset($_SESSION['add']); //Remove the Session Message
        }

        if (isset($_SESSION['delete'])) { //Checking whether the Session set or not
            echo($_SESSION['delete']); //Display the session Message if set
            unset($_SESSION['delete']); //Remove the Session Message
        }

        if (isset($_SESSION['upload'])) { //Checking whether the Session set or not
            echo($_SESSION['upload']); //Display the session Message if set
            unset($_SESSION['upload']); //Remove the Session Message
        }

        if (isset($_SESSION['unauthorize'])) { //Checking whether the Session set or not
            echo($_SESSION['unauthorize']); //Display the session Message if set
            unset($_SESSION['unauthorize']); //Remove the Session Message
        }

        if (isset($_SESSION['update'])) { //Checking whether the Session set or not
            echo($_SESSION['update']); //Display the session Message if set
            unset($_SESSION['update']); //Remove the Session Message
        }

?>
<br><br>

              <!--ADD food btn-->
        <a href="add-food.php"  class="btn btn-primary ">Add Food</a>

              <br> <br>
              <table class="content-table">
                <thead>
                   
                  <tr>
                      <th>Serial no</th>
                      <th>Title </th>
                      <th>Image</th>
                      <th>Price</th>
                      <th>Featured</th>
                      <th>Active</th>
                      <th>Actions</th>
                  </tr>
                </thead>
                <?php

        $sql = "SELECT * FROM tbl_food";

        $res = mysqli_query($conn, $sql);
        
        $count = mysqli_num_rows($res);

        $sn=1;
        if ($count>0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id=$row['id'];
                $title=$row['title'];
                $price=$row['price'];
                $image_name=$row['image_name'];
                $featured=$row['featured'];
                $active=$row['active']; ?>

<tr>
       <td><?php echo $sn++; ?></td>
       <td><?php echo $title; ?></td>
       <td><?php echo $price; ?></td>
       <td>
            <?php
                if ($image_name=="") {
                    echo "<div class ='error'>Image not Added</div>";
                } else {
                    ?>
                    <img src="<?php echo SITE; ?>images/food/<?php echo $image_name; ?>" width = 70px >
                    <?php
                } ?>
       </td>
       <td><?php echo $featured; ?></td>
       <td><?php echo $active; ?></td>
       <td>
       <a href="<?php echo SITE; ?>admin/update-food.php?id=<?php echo $id; ?>" class="btn-update">Update</a>
       <a href="<?php echo SITE; ?>admin/delete-food.php?id=<?php echo $id; ?> &image_name=<?php echo $image_name; ?>" class="btn-detele">Delete</a>
       
       </td>
   </tr>

                <?php
            }
        } else {
            echo "<tr><td colspan='7' class ='error'><b>Food not Added Yet </b></td></tr>";
        }
   ?>

              </table>
            </div>
        </div>
        
 <?php include("partials/footer.php"); ?>     