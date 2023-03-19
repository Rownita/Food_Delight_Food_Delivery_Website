<?php  include("partials/menu.php"); ?>

            <div class="main-content" >
                <div class="wrapper">
                  <h1>Add-Category</h1> 
                  <br>
                  <br>
                  <?php
                 if (isset($_SESSION['add'])) { //Checking whether the Session set or not
                     echo($_SESSION['add']); //Display the session Message if set
                     unset($_SESSION['add']); //Remove the Session Message
                 }
                  
               
                 if (isset($_SESSION['upload'])) { //Checking whether the Session set or not
                     echo($_SESSION['upload']); //Display the session Message if set
                     unset($_SESSION['upload']); //Remove the Session Message
                 }
                  ?>
                  <!--add category from start-->
                  <form action="" method="post" enctype="multipart/form-data">
                  <table class="add-table"  align="center" width="45%" cellspacing="30">
    
                     <tr >
                          <td ><h3>Title :</h3></td>
                          <td>
                              <input type="text" name="title" placeholder="Category Title" >
                          </td>
                              
                      </tr>
                      <tr>
                          <td ><h3>Select Image :</h3></td>
                          <td>
                              <input type="file" name="image">
                          </td>
                          
                      </tr>
                      <tr>
                          <td><h3> Featured :</h3> </td>
                          <td>
                              <input type="radio" name="featured" value="Yes">YES
                              <input type="radio" name="featured" value="No">NO
                          </td>
                        
                    </tr>
                    <tr>
                        <td >
                           <h3>Active :</h3> 
                        </td>
                        <td>
                            <input type="radio" name="active" value="Yes">YES
                            <input type="radio" name="active" value="No">NO

                        </td>
                       
                    </tr>
                    <tr>
                        <td colspan="2" align="center">
                            <input type="submit" name="submit" value ="Add Category" class="btn2">

                        </td>
                    </tr>
                      


                  </table>
                </form>
                  

                  <!--from ends-->
              </div>
              </div>
              <?php
          //Check whether the button is clicked or not

          if (isset($_POST['submit'])) {
              //Button clicked
              // echo "Button Clicked";
              //1.Get The value from form
      
              $title = $_POST['title'];
              //for radio input type we need to check whether the button selected or not
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
                          header("location:".SITE.'admin/add-category.php');
                          //Stop the process
                          die();
                      }
                  }
              } else {
                  //Don't upload the image and set the image_name value as blank
                  $image_name = "";
              }
      
              //2.SQL Query to save the category into Database
              $sql = "INSERT INTO tbl_category SET
                  title ='$title',
                  image_name='$image_name',
                  featured ='$featured',
                  active ='$active'
                  ";
      
              //Executing Query and Saving Data into Database
              
              $res = mysqli_query($conn, $sql);
          
              //4.Check whether the (Query is executed) Data is inserted or not and display appropriate message
      
              if ($res==true) {
                  //Data inserted successfully
                  //Create a Session Variable to display Message
                  $_SESSION['add'] = "<div class= 'success'><b>Category added Successfully</b></div>";
      
                  //Redirect Page to Manage Admin
                  header("location:".SITE.'admin/manage-category.php');
              } else {
                  //Data not inserted successfully
                  //Create a Session Variable to display Message
                  $_SESSION['add'] = "<div class ='error'><b>Failed to add Category</b></div>";
      
                  //Redirect Page to Add Admin
                  header("location:".SITE.'admin/add-category.php');
              }
          }
      
       ?>
      
              <?php include("partials/footer.php"); ?>

