<?php

//Include constants.php file here
include('../config/constants.php');

if (isset($_GET['id']) and isset($_GET['image_name'])) {
    //Get the value an delete
    $id = $_GET['id'];
    $image_name = $_GET['image_name'];

    //Remove the physical image file is available
    
    if ($image_name!= "") {
        //image is available. So remove it.
        $path="../images/category/".$image_name;
        //Remove the image

        $remove=unlink($path);

        if ($remove==false) {

            //Set the session message
            $_SESSION['remove'] ="<div class='error'><b>Failed to delete category image</b></div>";
            //Redirect to Manage Category Page
            header("location:".SITE.'admin/manage-category.php');
        }
    }

    //Delete data from database
    //Redirect to manage category page with message

    $sql = "DELETE FROM tbl_category WHERE id=$id";
    //Execute the Query
    $res = mysqli_query($conn, $sql);
    //Check whether the query executed or not
    if ($res==true) {
        //Query Executed Successfully and Deleted
        //Create Session variable to Display Message
        $_SESSION['delete'] ="<div class='success'><b>Category Deleted Successfully</b></$image_name>";
        //Redirect to Manage Admin Page
        header("location:".SITE.'admin/manage-category.php');
    } else {
        //Failed to Delete Admin
        //echo "Failed to Delete Category";
        //Create Session variable to Display Message
        $_SESSION['delete'] ="<div class ='error'><b>Failed to Delete Category. Please Try again later </b></div>";
        //Redirect to Manage Admin Page
        header("location:".SITE.'admin/manage-category.php');
    }
} else {
    //Redirect to manage category page
    header("location:".SITE.'admin/manage-category.php');
}
