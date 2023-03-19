<?php
 
 include("partials/menu.php");
    //Check whether the submit button is clicked or not
    // =====================================update single category into db===================
if (isset($_POST['submit'])) {
    
    //Get all the values from form to update
    $id = $_POST['id'];
    $title = $_POST['title'];
    $current_image = $_POST['current_image'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    //Check whether the image is selected or not and set the value for image name accordingly

    if (isset($_FILES['image']['name'])) {
        //Upload the image
        //To upload image we need image name, source name and destination path
        $image_name = $_FILES['image']['name'];
        //Auto rename our image
        //test the extension of our image (jpg, png, gif etc) e.g."food1.jpg"
        if ($image_name!="") {
            $ext = end(explode('.', $image_name));
      
            //Rename the image_name
            $image_name = "Food_Category_".rand(000, 999).'.'.$ext;
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/category/".$image_name;

            //Finally upload the image
            $upload = move_uploaded_file($source_path, $destination_path);
            //Check whether the image is uploaded or not
            //And if the image is not uploaded then we will stop the process and redirect with error message

            if ($upload==false) {
                //set message
                $_SESSION['upload'] = "<div class= 'error'><b>Failed to upload image</b></div>";
                header("location:".SITE.'admin/manage-category.php');
                //Stop the process
                die();
            }

            if ($current_image!="") {
                $remove_path = "../images/category/".$current_image;
                $remove = unlink($remove_path);

                if ($remove==false) {
                    //Failed to remove image
                    $_SESSION['failed-remove'] = "<div class= 'error'><b>Failed to remove current image</b></div>";
                    header("location:".SITE.'admin/manage-category.php');
                    //Stop the process
                    die();
                }
            }
        } else {
            $image_name = $current_image;
        }
    } else {
        //Don't upload the image and set the image_name value as blank
        $image_name = $current_image;
    }


    //Create a sql Query to update Admin
    $sql2 ="UPDATE tbl_category SET 
    title = '$title',
    image_name='$image_name',
    featured = '$featured',
    active = '$active'
    WHERE id = '$id'
    ";
    //Execute the Query
    $res2 = mysqli_query($conn, $sql2);

    if ($res2==true) {
        //Query executed and category updated
        $_SESSION['update'] = "<div class= 'success'><b>Category updated Successfully</b></div>";

        //Redirect Page to Manage Category
        header("location:".SITE.'admin/manage-category.php');
    } else {
        //Failed to update category
        $_SESSION['update'] = "<div class= 'error'><b>Failed to update Category</b></div>";

        //Redirect Page to Manage Category
        header("location:".SITE.'admin/manage-category.php');
    }
}

?>

<!-- ====================get single category from db======================== -->
<?php

    if (isset($_GET['id'])) {

        //1.Get the ID of selected Admin
        $id = $_GET['id'];
        //2.Create SQL Query to get the details
        $sql = "SELECT * FROM tbl_category WHERE id=$id";

        //Execute the Query
        $res = mysqli_query($conn, $sql);
        //Check the query is executed or not
        
        //Check whether the data is available or not
        $count = mysqli_num_rows($res);
        //Check whether we have admin data or not
        if ($count==1) {
            //Get the details
            $row=mysqli_fetch_assoc($res);
            $title = $row['title'];
            $current_image = $row['image_name'];
            $featured = $row['featured'];
            $active = $row['active'];
            ;
        } else {
            $_SESSION['no-category-found'] = "<div class= 'error'><b>Category not found</b></div>";
            //Redirect to Manage Admin Page
            header("location:".SITE.'admin/manage-category.php');
        }
    } else {
        //Redirect to manage category page
        header("location:".SITE.'admin/manage-category.php');
    }
    
 ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <!--update category from start-->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="add-table" align="center" width="35%" cellspacing="30">

                <tr>
                    <td class="color">
                        <h3>Title :</h3>
                    </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $title; ?>">
                    </td>

                </tr>
                <tr>
                    <td>
                        <h3>Current Image :</h3>
                    <td>
                        <?php
                                if ($current_image!="") {
                                    //Display The Image?>
                        <img src="<?php echo SITE; ?>images/category/<?php echo $current_image; ?>" width=150px>
                        <?php
                                } else {
                                    //Display message
                                    echo "<div class='error'>Image not added</div>";
                                }
                            ?>

                    </td>
                    </td>
                </tr>
                <tr>
                    <td>New Image: </td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Featured: </td>
                    <td>
                        <input <?php if ($featured =="Yes") {
                                echo "checked";
                            }?> type="radio" name="featured" value="Yes">Yes

                        <input <?php if ($featured =="No") {
                                echo "checked";
                            } ?> type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active: </td>
                    <td>
                        <input <?php if ($active =="Yes") {
                                echo "checked";
                            }?> type="radio" name="active" value="Yes">Yes

                        <input <?php if ($active =="No") {
                                echo "checked";
                            }?> type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update" class="btn2">

                    </td>
                </tr>
            </table>
        </form>


        <!--from ends-->
    </div>
</div>

<?php include("partials/footer.php"); ?>