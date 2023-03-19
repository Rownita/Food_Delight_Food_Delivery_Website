<?php  include("partials/menu.php"); ?>

    <div class="main-content">
        <div class="wrapper">
            <h1>Add Admin</h1>
            <br>
            <br>

            <?php
                 if (isset($_SESSION['add'])) { //Checking whether the Session set or not
                     echo($_SESSION['add']); //Display the session Message if set
                     unset($_SESSION['add']); //Remove the Session Message
                 }
            ?>


            <form action="" method="POST">

                <table class="tbl-40 " cellspacing="28">
                    <tr>
                        <td>
                        <h4>Full Name :</h4>
                        </td>
                        <td> <input type="text" name="full_name" placeholder="Enter Name"></td>
                    </tr>
                    <br>
                    <tr>
                        <td>
                            <h4>Username :</h4>
                        </td>
                        <td> <input type="text" name="username" placeholder="Enter Username"></td>
                    </tr>
                    <br>
                    <tr>
                        <td>
                            <h4>Password :</h4>
                        </td>
                        <td> <input type="password" name="password" placeholder="Enter password"></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="submit" name="submit" value="ADD ADMIN" class="btn"> 
                        </td>
                    </tr>

                </table>
            </form>
        </div>

    </div>
    <?php include("partials/footer.php"); ?>


    <?php
    //Process the value from form and save it in Database
    //Check whether the button is clicked or not

    if (isset($_POST['submit'])) {
        //Button clicked
        //1.Get The Data from form

        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); //Password Encryption with Md5

        //2.SQL Query to save the Data into Database
        $sql = "INSERT INTO tbl_admin SET
            full_name ='$full_name',
            username ='$username',
            password ='$password'
            ";

        //3.Executing Query and Saving Data into Database
        
        $res = mysqli_query($conn, $sql);
    
        //4.Check whether the (Query is executed) Data is inserted or not and display appropriate message

        if ($res==true) {
            //Data inserted successfully
            //Create a Session Variable to display Message
            $_SESSION['add'] = "<div class= 'success'><b>Admin added Successfully</b></div>";

            //Redirect Page to Manage Admin
            header("location:".SITE.'admin/manage-admin.php');
        } else {
            //Data not inserted successfully
            //Create a Session Variable to display Message
            $_SESSION['add'] = "<div class ='error'><b>Failed to add Admin</b></div>";

            //Redirect Page to Add Admin
            header("location:".SITE.'admin/add-admin.php');
        }
    }

 ?>