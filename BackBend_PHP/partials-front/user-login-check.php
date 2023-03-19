<?php
    //Authorization-Access Control
    //Check whether the user is logged in or not

    if (!isset($_SESSION['user'])) { //If user session is not set
        //User is not Logged in
        //Redirect to login page with message

        $_SESSION['no-login-user'] = "<div class ='error text-center'><b>Please login again</b></div>";
        //Redirect to login page
        header("location:".SITE.'user-login-register.php');
    }