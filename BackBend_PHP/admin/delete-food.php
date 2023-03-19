<?php
    include('../config/constants.php');
    

    if (isset($_GET['id']) && isset($_GET['image_name'])) {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        if ($image_name!="") {
            $path = "../images/food/".$image_name;
            $remove = unlink($path);

            if ($remove==false) {
                $_SESSION['upload'] ="<div class='error'><b>Failed to remove image</b></div>";
                //Redirect to Manage Category Page
                header("location:".SITE.'admin/manage-food.php');
                //Stop the process
                die();
            }
        }

        $sql = "DELETE FROM tbl_food WHERE id=$id";
        $res = mysqli_query($conn, $sql);
        
        if ($res==true) {
            $_SESSION['delete'] ="<div class='success'><b>Food Deleted Successfully</b></$image_name>";
            //Redirect to Manage Admin Page
            header("location:".SITE.'admin/manage-food.php');
        } else {
            $_SESSION['delete'] ="<div class='error'><b>Failed to Delete Food</b></$image_name>";
            //Redirect to Manage Admin Page
            header("location:".SITE.'admin/manage-food.php');
        }
    } else {
        $_SESSION['unauthorize'] ="<div class='error'><b>Unauthorized Access</b></div>";
        //Redirect to Manage Category Page
        header("location:".SITE.'admin/manage-food.php');
    }
