<?php  include("partials/menu.php"); ?>

        <div class="main-content" >
            <div class="wrapper">  
              <h1>Manage Category </h1> 
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

                 if (isset($_SESSION['remove'])) { //Checking whether the Session set or not
                    echo($_SESSION['remove']); //Display the session Message if set
                    unset($_SESSION['remove']); //Remove the Session Message
                 }

                 ?>
                 <br><br>

              <!--ADD category btn-->
        <a href="add-category.php"  class="btn btn-primary ">Add Category</a>

              <br> <br>
              <table class="content-table">
                <thead>
                  <tr>
                      <th>Serial no</th>
                      <th>Title </th>
                      <th>Image</th>
                      <th>Featured</th>
                      <th>Active</th>
                      <th>Actions</th>
                  </tr>
                </thead>
                
                <body>
                <?php
                        //Query to get all Category from database
                        $sql = "SELECT * FROM tbl_category";
                        //Execute the Query
                        $res = mysqli_query($conn, $sql);

                        //Check whether the query is executed or not
                        if ($res == true) {
                            //Count rows to check whether we have data in database or not
                            $count = mysqli_num_rows($res); //Function to get all rows in database
                            $sn =1; //Create a variable and assign the value
                            //Check the num of rows
                            if ($count>0) {

                                /*We have data in database*/
                                while ($rows = mysqli_fetch_assoc($res)) {
                                    //Using while loop to get all the data from database
                                    //And while loop will run as long as we have data in database

                                    //Get individual data
                                    $id = $rows["id"];
                                    $title = $rows["title"];
                                    $image_name = $rows["image_name"];
                                    $featured = $rows["featured"];
                                    $active = $rows["active"];

                                    //Display the values in our table?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $title; ?></td>
                                        <td>
                                            <?php
                                            //Check whether image name is available
                                            if ($image_name!="") {
                                                //Display the image?>
                                                <img src="<?php echo SITE; ?>images/category/<?php echo $image_name; ?>" width = 100px >
                                                <?php
                                            } else {
                                                //Display the message
                                                echo  "<div class = 'error'><b>Image not Added</b></div>";
                                            } ?>
                                        </td>
                                        <td><?php echo $featured; ?></td>
                                        <td><?php echo $active; ?></td>
                                        <td> <a href="#"class="btn-update">Update</a>
                                             <a href="<?php echo SITE; ?>admin/delete-category.php?id=<?php echo $id; ?> &image_name=<?php echo $image_name; ?>" class="btn-detele">Delete</a>
                                        </td>
                                    </tr>

                                    <?php
                                }
                            } else {
                                //We do not have data in database
                                //We'll display the message inside table
                                ?>
                                <tr>
                                    <td colspan="6"><div class ="error">No Category Added</div></td>
                                </tr>

                                <?php
                            }
                        }
                     
                        ?>
               
                </body>
              </table>
            </div>
        </div>
        <?php include("partials/footer.php"); ?>
        
       
