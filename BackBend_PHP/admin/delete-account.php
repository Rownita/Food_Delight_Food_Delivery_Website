<?php

//Include constants.php file here
include('../config/constants.php');

$id = $_GET['id'];
//2.Create SQL Query to delete Account

$sql = "DELETE FROM tbl_admin WHERE id=$id";
//Execute the Query
$res = mysqli_query($conn, $sql);
//Check whether the query executed or not
if ($res==true) {
    //Query Executed Successfully and Deleted
    //Create Session variable to Display Message
    $_SESSION['delete-account'] ="<div class='success'><b>Admin Account Deleted Successfully</b></div>";
    //Redirect to Manage Admin Page
    header("location:".SITE.'admin/login.php');
} else {
    //Failed to Delete Account
    //Create Session variable to Display Message
    $_SESSION['delete-account'] ="<div class ='error'><b>Failed to Delete Admin Account. Please Try again later</b> </div>";
    //Redirect to Manage Admin Page
    header("location:".SITE.'admin/admin-profile.php');
}