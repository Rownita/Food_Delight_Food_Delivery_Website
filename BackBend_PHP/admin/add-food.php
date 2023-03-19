<?php  include("partials/menu.php"); ?>
            <div class="main-content" >
                <div class="wrapper">
                  <h1>Add Food</h1> 
<?php
        if (isset($_SESSION['upload'])) { //Checking whether the Session set or not
            echo($_SESSION['upload']); //Display the session Message if set
            unset($_SESSION['upload']); //Remove the Session Message
        }
?>

                
                  <!--add food from start-->
                  <form action="" method="POST" enctype="multipart/form-data">
                  <table class="add-table"  align="center" width="35%" cellspacing="30">
    
                  <tr>
                    <td>Title: </td>
                    <td><input type="text" name="title" placeholder="Title of the Food"></td>
                </tr>

                <tr>
                    <td>Description: </td>
                    <td><textarea name="description" cols="30" rows="5" placeholder="Description of the Food" ></textarea>
                </tr>

                <tr>
                    <td>Price: </td>
                    <td>
                    <input type="number" name="price">
                    </td>
                </tr>

                <tr>
                    <td>Select Image: </td>
                    <td>
                    <input type="file" name="image">
                </td>
                </tr>

            <tr>
                <td>Category: </td>
                <td>
                    <select name="category">

                <?php
                    $sql = "SELECT * FROM tbl_category WHERE active='Yes'";
                    $res = mysqli_query($conn, $sql);

                    $count = mysqli_num_rows($res);

                    if ($count>0) {
                        while ($row = mysqli_fetch_assoc($res)) {
                            $id = $row['id'];
                            $title = $row['title']; ?>

                            <option value="<?php echo $id; ?>"><?php echo $title; ?></option>

                    <?php
                        }
                    } else {
                        ?>
                        <option value="0">No Category Found</option>
                <?php
                    }


         ?>
        
        </select>
        </td>
    </tr>

    <tr>
        <td>Featured: </td>
        <td>
        <input type="radio" name="featured" value="Yes">Yes
        <input type="radio" name="featured" value="No">No
        </td>
    </tr>

    <tr>
    <td>Active: </td>
        <td>
        <input type="radio" name="active" value="Yes">Yes
        <input type="radio" name="active" value="No">No
        </td>
    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name = "submit" value ="Add Food" class="btn2">

                        </td>
                    </tr>

                  </table>
                </form>

                <?php

    if (isset($_POST['submit'])) {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        if (isset($_POST['featured'])) {
            //Get the value from form
            $featured = $_POST['featured'];
        } else {
            //Set the default value
            $featured = "No";
        }
        
        if (isset($_POST['active'])) {
            //Get the value from form
            $active = $_POST['active'];
        } else {
            //Set the default value
            $active = "No";
        }

        if (isset($_FILES['image']['name'])) {
            $image_name = $_FILES['image']['name'];
            
            if ($image_name!="") {
                $ext = end(explode('.', $image_name));
                
                //Rename the image_name
                $image_name = "Food_Name_".rand(0000, 9999).'.'.$ext;
                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../images/food/".$image_name;

                //Finally upload the image
                $upload = move_uploaded_file($source_path, $destination_path);
                //Check whether the image is uploaded or not
                //And if the image is not uploaded then we will stop the process and redirect with error message

                if ($upload==false) {
                    //set message
                    $_SESSION['upload'] = "<div class= 'error'><b>Failed to upload image</b></div>";
                    header("location:".SITE.'admin/add-food.php');
                    //Stop the process
                    die();
                }
            }
        } else {
            $image_name="";
        }
        $sql2 = "INSERT INTO tbl_food SET
            title = '$title',
            description = '$description',
            price = $price,
            image_name='$image_name',
            category_id = $category,
            featured = '$featured',
            active = '$active'

        ";

        $res2 = mysqli_query($conn, $sql2);

        if ($res2==true) {
            $_SESSION['add'] = "<div class= 'success'><b>Food added Successfully</b></div>";
      
            //Redirect Page to Manage Admin
            header("location:".SITE.'admin/manage-food.php');
        } else {
            $_SESSION['add'] = "<div class= 'error'><b>Failed to add Food</b></div>";
      
            //Redirect Page to Manage Admin
            header("location:".SITE.'admin/manage-food.php');
        }
    }
?>
                  

                  <!--from ends-->
        </div>
    </div>
<?php include("partials/footer.php"); ?>

