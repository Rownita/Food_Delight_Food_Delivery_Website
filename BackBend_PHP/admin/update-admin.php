<?php  include("partials/menu.php");?>

<html>
            <div class="main-content" >
                <div class="wrapper">
                  <h1>Edit Admin</h1> 
                  <br>
            <?php
                //1.Get the ID of selected Admin
                $id = $_GET['id'];
                //2.Create SQL Query to get the details
                $sql = "SELECT * FROM tbl_admin WHERE id=$id";

                //Execute the Query
                $res = mysqli_query($conn, $sql);
                //Check the query is executed or not
                if ($res==true) {
                    //Check whether the data is available or not
                    $count = mysqli_num_rows($res);
                    //Check whether we have admin data or not
                    if ($count==1) {
                        //Get the details
                        $row=mysqli_fetch_assoc($res);
                        $full_name = $row['full_name'];
                        $username = $row['username'];
                    } else {
                        //Redirect to Admin Profile Page
                        header("location:".SITE.'admin/admin-profile.php');
                    }
                }
 ?>


                  <form action="" method="POST">
                    
                      <table class="tbl-45 "  cellspacing="28">
                          <tr>
                              <td><h4>Full Name :</h4> </td>
                              <td> <input type="text" name="full_name" placeholder="Enter Name" ></td>   
                          </tr>
                          <br>
                          <tr>
                            <td><h4>Username :</h4> </td>
                            <td> <input type="text" name="username" placeholder="Enter Username" ></td>    
                        </tr>
                        
                        <br>
                
                        <tr> 
                            <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                            <td><input type="submit" name="submit" value="EDIT ADMIN" class="btn"> </td>
                        </tr>

                      </table>
                  </form>
                  </div>
                  <br><br><br><br><br><br>

        </div>

</html>


<?php
    //Check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    
    //Get all the values from form to update
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];

    //Create a sql Query to update Admin
    $sql ="UPDATE tbl_admin SET 
    full_name = '$full_name',
    username = '$username'
    WHERE id = '$id'
    ";
    //Execute the Query
    $res = mysqli_query($conn, $sql);

    if ($res==true) {
        //Query executed and admin updated
        $_SESSION['edit'] = "<div class= 'success'><b>Admin updated Successfully</b></div>";

        //Redirect Page to Admin Profile
        header("location:".SITE.'admin/admin-profile.php');
    } else {
        //Failed to update admin
        $_SESSION['edit'] = "<div class= 'error'><b>Failed to update Admin</b></div>";

        //Redirect Page to  Admin Profile
        header("location:".SITE.'admin/admin-profile.php');
    }
}
?>

<?php include("partials/footer.php"); ?>