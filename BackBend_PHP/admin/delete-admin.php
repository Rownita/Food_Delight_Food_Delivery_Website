<?php

//Include constants.php file here
include('../config/constants.php');
//1.Get the id of Category to be deleted
$id = $_GET['id'];
//2.Create SQL Query to delete Admin

$sql = "DELETE FROM tbl_admin WHERE id=$id";
//Execute the Query
$res = mysqli_query($conn, $sql);
//Check whether the query executed or not
if ($res==true) {
    //Query Executed Successfully and Deleted
    //Create Session variable to Display Message
    $_SESSION['delete'] ="<div class='success'><b>Admin Deleted Successfully</b></div>";
    //Redirect to Manage Admin Page
    header("location:".SITE.'admin/manage-admin.php');
} else {
    //Failed to Delete Admin
    //Create Session variable to Display Message
    $_SESSION['delete'] ="<div class ='error'><b>Failed to Delete Admin. Please Try again later</b> </div>";
    //Redirect to Manage Admin Page
    header("location:".SITE.'admin/manage-admin.php');
}
