<?php include('./config/constants1.php') ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <title>Food Delight-user login</title>
    <link rel="stylesheet" href="./css/user-login.css">
</head>

<body>


    <div class="login-page">

        <div class="box">

            <div class="left">
                <h3>Create Account To Enjoy Food</h3>
                <button type="button" class="register-btn">Register</button>

            </div>
            <div class="right">
                <h3>Have An Account ?</h3>
                <button type="button" class="login-btn">Login in</button>

            </div>
            <div class="form">
                <!--login form start-->
                <form action="" method="POST">
                    <div class="login-form ">
                        <h3 align="center">Login</h3>
                        <div class="form-group">
                            <input type="text" name="customer_name" placeholder="Name" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>

                        <button type="login" name="login" class="submit-btn">LOGIN</button>
                        <p><a href="#" class="register-btn">Register</a> </p>
                    </div>
                </form>
                <!--login form ends-->

                <!--registration form start-->
                <form action="" method="POST">
                    <div class="register-form form-hidden">
                        <h3 align="center">Register</h3>
                        <?php
        if (isset($_SESSION['register'])) {
            echo $_SESSION['register']; //Display Session Message
            unset($_SESSION['register']); //Removing Session Message
        if (isset($_SESSION['login-user'])) {
            echo $_SESSION['login-user']; //Display Session Message
            unset($_SESSION['login-user']); //Removing Session Message
        }
            if (isset($_SESSION['no-login-user'])) {
                echo $_SESSION['no-login-user']; //Display Session Message
            unset($_SESSION['no-login-user']); //Removing Session Message
            }
        }?>
                        <div class="form-group">
                            <div class="form-group">
                                <input type="text" name="customer_name" placeholder="Name" class="form-control">
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" placeholder="Password" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="customer_email" placeholder="Email" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="text" name="customer_contact" placeholder="Phone Number"
                                    class="form-control">
                            </div>
                            <input type="text" name="customer_address" placeholder="Address" class="form-control">
                        </div>

                        <button type="submit" name="submit" class="submit-btn">REGISTER</button>
                        <p><a href="#" class="login-btn">Login</a> </p>
                    </div>
                </form>
                <!--register form ends-->
            </div>

        </div>

    </div>
    <script src="script.js"></script>

</body>

</html>


<?php
    if (isset($_POST['submit'])) {

        //Process for login
        //1.Get all the data from Login form

        $customer_name = $_POST['customer_name'];
        $password = md5($_POST['password']);
        $customer_email = $_POST['customer_email'];
        $customer_contact = $_POST['customer_contact'];
        $customer_address = $_POST['customer_address'];

        //2.SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_customer WHERE customer_name ='$customer_name'" ;

        //Execute the query
        $res = mysqli_query($conn, $sql);
        

        //4. Count rows to check whether the user exists or not

        $count = mysqli_num_rows($res);

        if ($count==1) {
            //Username exists
            
            $_SESSION ['register'] = "<div class= 'error'><b>Username is already taken</b></div>";
            //Redirect to Register Page
            
            header("location:".SITE.'user-login-register.php');
        } else {
            $sql1 = "INSERT into tbl_customer (customer_name, password, customer_email, customer_contact, customer_address) values ('$customer_name', '$password','$customer_email','$customer_contact', '$customer_address')";
            $res1 = mysqli_query($conn, $sql1);
            //Username not Available
            $_SESSION ['register'] = "<div class= 'success'><b>Registration Successful</b></div>";

            //Redirect to login page
            header("location:".SITE.'user-login-register.php');
        }
    }
?>

<?php
    if (isset($_POST['login'])) {

        //Process for login
        //1.Get all the data from Login form

        $customer_name = $_POST['customer_name'];
        $password = md5($_POST['password']);
        $customer_email = $_POST['customer_email'];
        $customer_contact = $_POST['customer_contact'];
        $customer_address = $_POST['customer_address'];

        //2.SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_customer WHERE customer_name ='$customer_name' AND password ='$password'" ;

        //Execute the query
        $res = mysqli_query($conn, $sql);
        

        //4. Count rows to check whether the user exists or not

        $count = mysqli_num_rows($res);

        if ($count==1) {
            //Username exists
            
            $_SESSION ['login-user'] = "<div class= 'success'><b>Login Successful</b></div>";
            $_SESSION['user'] = $customer_name;
            //Redirect to Register Page
            
            header("location:".SITE.'index.php');
        } else {
            
            //Username not Available
            $_SESSION ['login-user'] = "<div class= 'error'><b>Login Failed</b></div>";

            //Redirect to login page
            header("location:".SITE.'user-login-register.php');
        }
    }
?>