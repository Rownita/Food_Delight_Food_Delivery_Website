<?php include('../config/constants.php') ?>
<html>

<head>
    <title>Admin Login</title>
    <link rel="stylesheet" href="../css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <title>Sign in</title>
</head>

<body>
    <div class="main">
        <h2 class="sign" align="center">Administrator Login</h2>
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login']; //Display Session Message
            unset($_SESSION['login']); //Removing Session Message
        }

        if (isset($_SESSION['no-login-message'])) {
            echo $_SESSION['no-login-message']; //Display Session Message
            unset($_SESSION['no-login-message']); //Removing Session Message
        }
         if (isset($_SESSION['delete-account'])) {
            echo $_SESSION['delete-account'];
            unset($_SESSION['delete-account']);
                            }
        

    ?>
        <form action="" method="POST" class="form1">
            <input class="un " type="text" name="username" align="center" placeholder="Username">
            <input class="pass" type="password" name="password" align="center" placeholder="Password">
            <br>
            <button class="submit" align="center" name="submit">LOGIN</button>
        </form>



    </div>

</body>

</html>
<?php
//Check whether the submit Button is clicked or not
    if (isset($_POST['submit'])) {

        //Process for login
        //1.Get all the data from Login form

        $username = $_POST['username'];
        $password = md5($_POST['password']);

        //2.SQL to check whether the user with username and password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE username ='$username' AND password ='$password'";

        //Execute the query
        $res = mysqli_query($conn, $sql);
        

        //4. Count rows to check whether the user exists or not

        $count = mysqli_num_rows($res);

        if ($count==1) {
            //User Available and login successfully
            $_SESSION['login'] = "<div class= 'success'><b>Login Successful</b></div>";
            $_SESSION['user']=$username; //Check the user is logged in or not an logout with unset it
           

            //Redirect to Home Page/Dashboard
            header("location:".SITE.'admin/');
        } else {
            //User not Available
            $_SESSION['login'] = "<div class= 'error text-center'><b>Username or Password did not match</b></div>";

            //Redirect to Home Page/Dashboard
            header("location:".SITE.'admin/login.php');
        }
    }
?>
