<?php  include("partials/menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <div class="container">
            <div class="avatar">
                <img src="../admin-img/pngegg.png" alt="account">
            </div>

            <?php

              $username = $_SESSION["user"];
             
              $sql = "SELECT * FROM tbl_admin WHERE username = '$username'";

              $res = mysqli_query($conn, $sql);

    //Check the query is executed or not
    if ($res==true) {
        //Check whether the data is available or not
        $count = mysqli_num_rows($res);
        //Check whether we have admin data or not
        if ($count==1) {
            //Get the details
            $row=mysqli_fetch_assoc($res);

            $full_name = $row['full_name'];
            $username = $row['username'];
            $id = $row['id'];
        }
    }
 ?>

            <form action="" method="POST">
                <table class="profile-table">
                    <thead>
                        <tr>
                            <th colspan="2">
                                <h2 align="center">Profile Information</h2>
                            </th>

                        </tr>
                    </thead>


                    <tr>
                        <th>Full Name: </th>
                        <td><?php echo $full_name; ?></td>
                    </tr>

                    <tr>
                        <th>Username: </th>
                        <td><?php echo $username; ?></td>
                    </tr>

                    <tr>
                        <th>User ID: </th>
                        <td><?php echo $id; ?></td>
                    </tr>
                </table>
            </form>
        </div>
        <?php
                            if (isset($_SESSION['edit'])) {
                                echo $_SESSION['edit']; //Display Session Message
                                unset($_SESSION['edit']); //Updating Session Message
                            }

                            if (isset($_SESSION['user-not-found'])) {
                                echo $_SESSION['user-not-found'];
                                unset($_SESSION['user-not-found']);
                            }
           
                            if (isset($_SESSION['pwd-not-match'])) {
                                echo $_SESSION['pwd-not-match'];
                                unset($_SESSION['pwd-not-match']);
                            }
           
                            if (isset($_SESSION['change-pwd'])) {
                                echo $_SESSION['change-pwd'];
                                unset($_SESSION['change-pwd']);
                            }
                        ?>
        <br><br>
        <div align="left" cellpadding="50%" cellspacing="10%">
            <tr>
                <a href="<?php echo SITE; ?>admin/edit-admin.php?id=<?php echo $id; ?>" class="btn-detele">Edit</a>
                <a href="<?php echo SITE; ?>admin/delete-account.php?id=<?php echo $id; ?>"
                    class="btn-detele">Delete</a>
                <a href="<?php echo SITE; ?>admin/update-password.php?id=<?php echo $id; ?>" class="btn-detele">Change
                    Password</a>

            </tr>
        </div>


    </div>
</div>


<?php include("partials/footer.php"); ?>