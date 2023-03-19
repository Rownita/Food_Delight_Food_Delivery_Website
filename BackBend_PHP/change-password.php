<?php include('partials-front/menu.php'); ?>

<head>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>


    <div style="margin-left:500px">
        <div class="container">
            <div class="row col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <h1>Update Password</h1>
                    </div>
                    <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    }
?>
                    <div class="panel-body" style="margin-top:50px;">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="password">Old Password </label>
                                <input type="password" class="form-control" name="current_password"
                                    placeholder="Enter Old Password" />
                            </div>
                            <div class="form-group">
                                <label for="password">New Password </label>
                                <input type="password" class="form-control" name="new_password"
                                    placeholder="Enter New Password" />
                            </div>
                            <div class="form-group">
                                <label for="password">Confirm Password </label>
                                <input type="password" class="form-control" name="confirm_password"
                                    placeholder="Enter Confirm Password" />
                            </div>
                            <input type="hidden" name="id" value="<?php echo $id; ?>"></input>
                            <input type="submit" name="submit" class="btn btn-primary" value="Update">
                        </form>
                    </div>
                </div>

                <?php
    //Check whether the submit button is clicked or not

    if (isset($_POST['submit'])) {
        //1.Get the data from form submit
        
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password =md5($_POST['confirm_password']);

        //2.Check whether the user with current id and current password exists or not
        $sql = "SELECT * FROM tbl_customer WHERE id = $id AND password = '$current_password'";
        //Execute the Query
        $res = mysqli_query($conn, $sql);
        if ($res==true) {
            $count = mysqli_num_rows($res);
            if ($count==1) {
                //User Exists and Password can be change
                //Check whether the new password and confirm password match or not
                if ($new_password == $confirm_password) {
                    //Change the Password
                    $sql2 = "UPDATE tbl_customer SET 
                        password = '$new_password'
                        WHERE id=$id
                    ";
                    //Execute the query
                    $res2 = mysqli_query($conn, $sql2);
                    //Check whether the query executed or not
                    if ($res2==true) {
                        //Display Success Message

                        //Redirect to Admin Profile Page with Success message
                        $_SESSION['change-pwd'] = "<div class= 'success'><b>Password changed Successfully</b></div>";

                        //Redirect the user
                        header("location:".SITE.'profile.php');
                    } else {
                        //Display Error Message
                        $_SESSION['change-pwd'] = "<div class= 'error'><b>Password not changed. Try again. </b></div>";

                        //Redirect the user
                        header("location:".SITE.'profile.php');
                    }
                } else {
                    //Redirect to Admin Profile Page with error message
                    $_SESSION['pwd-not-match'] = "<div class= 'error'><b>Password did not match</b></div>";

                    //Redirect the user
                    header("location:".SITE.'profile.php');
                }
            } else {
                //User does not Exist set message and Redirect
                $_SESSION['user-not-found'] = "<div class= 'error'><b>User not found</b></div>";

                //Redirect Page to User
                header("location:".SITE.'profile.php');
            }
        }
    }
        
        //3.Change password if all above is true
    
 ?>

                <?php include('partials-front/footer.php'); ?>