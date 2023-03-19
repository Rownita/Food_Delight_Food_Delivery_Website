<?php

//Include constants.php file here
include('../config/constants.php');

$id = $_GET['id'];
//2.Create SQL Query to delete Order

$sql = "DELETE FROM tbl_order WHERE id=$id";
//Execute the Query
$res = mysqli_query($conn, $sql);
//Check whether the query executed or not
if ($res==true) {
    //Query Executed Successfully and Deleted
    //Create Session variable to Display Message
    $_SESSION['delete-order'] ="<div class='success'><b>Order Deleted Successfully</b></div>";
    //Redirect to Manage Admin Page
    header("location:".SITE.'admin/manage-order.php');
} else {
    //Failed to Delete Order
    //Create Session variable to Display Message
    $_SESSION['delete-order'] ="<div class ='error'><b>Failed to Delete Order. Please Try again later</b> </div>";
    //Redirect to Manage Order Page
    header("location:".SITE.'admin/manage-order.php');
}