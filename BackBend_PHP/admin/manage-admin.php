<?php  include("partials/menu.php"); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Manage Admin</h1>
            <br>
            
            <?php
                 if (isset($_SESSION['add'])) {
                     echo $_SESSION['add']; //Display Session Message
                     unset($_SESSION['add']); //Removing Session Message
                 }

                 if (isset($_SESSION['delete'])) {
                     echo $_SESSION['delete']; //Display Session Message
                     unset($_SESSION['delete']); //Removing Session Message
                 }
            ?>

            <br><br><br>
            <!--ADD admin btn-->
            <a href="add-admin.php" class=" btn-primary ">Add Admin</a>

            <br><br>
            <table class="content-table">
                <thead>

                    <tr>
                        <th>Serial no</th>
                        <th>Full Name</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <?php
                        //Query to get all Admin
                        $sql = "SELECT * FROM tbl_admin";
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
                                    $full_name = $rows["full_name"];
                                    $username = $rows["username"];

                                    //Display the values in our table?>

                                    <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $full_name; ?></td>
                                        <td>
                                            <a href="<?php echo SITE; ?>admin/delete-admin.php?id=<?php echo $id; ?>" class="btn-detele">Delete</a> 
                                        </td>
                                    </tr>

                                    <?php
                                }
                            } else {
                                //We do not have data in database
                            }
                        }
                     ?>
                
            </table>
        </div>
    </div>

    
<?php include("partials/footer.php"); ?>
