<?php
    //Include constants.php for SITE

    include('./config/constants1.php');

    //1.Destroy the Session
    session_destroy(); //Unsets $_SESSION['user']

    //2.Redirect to Login Page
    header("location:".SITE.'user-login-register.php');