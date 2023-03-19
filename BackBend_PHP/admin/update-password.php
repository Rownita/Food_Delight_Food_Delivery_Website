<?php  include("partials/menu.php");?>

<html>
    
            <div class="main-content" >
                <div class="wrapper">
                  <h1>Change Password</h1> 
                  <br>
                  <?php
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                    }
 ?>
                  <form action="" method="POST">
                    
                      <table class="tbl-45"  cellspacing="30">
                          <tr>
                              <td><h4>Current Password:</h4> </td>
                              <td> <input type="password" name="current_password" placeholder="Enter Old Password" ></td>   
                          </tr>
                          <br>
                          <tr>
                            <td><h4>New Password:</h4> </td>
                            <td> <input type="password" name="new_password" placeholder="Enter New Password" ></td>    
                        </tr>
                        <br>
                        
                
                        <tr>
                            <td><h4>Confirm Password:</h4></td>
                            <td  >
                                <input type="password" name="confirm_password" placeholder="Confirm Password" > </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="hidden" name="id" value="<?php echo $id; ?>"></input>
                                <td><input  type="submit" name="submit" value="Change Password"  class="btn"></td>
                            </td>
                        </tr>

                      </table>
                  </form>
             </div>
                <br><br><br>
        </div>
       
</html>

<?php
    //Check whether the submit button is clicked or not

    if (isset($_POST['submit'])) {
        //1.Get the data from form submit
        $id = $_POST['id'];
        $current_password = md5($_POST['current_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password =md5($_POST['confirm_password']);

        //2.Check whether the user with current id and current password exists or not
        $sql = "SELECT * FROM tbl_admin WHERE id = $id AND password = '$current_password'";
        //Execute the Query
        $res = mysqli_query($conn, $sql);
        if ($res==true) {
            $count = mysqli_num_rows($res);
            if ($count==1) {
                //User Exists and Password can be change
                //Check whether the new password and confirm password match or not
                if ($new_password == $confirm_password) {
                    //Change the Password
                    $sql2 = "UPDATE tbl_admin SET 
                        password = '$new_password'
                        WHERE id=$id
                    ";
                    //Execute the query
                    $res2 = mysqli_query($conn, $sql2);
                    //Check whether the query executed or not
                    if ($res2==true) {
                        //Display Success Message

                        //Redirect to Admin Profile Page with Success message
                        $_SESSION['change-pwd'] = "<div class= 'success'><b>Password changed Successfully</b></div>";

                        //Redirect the user
                        header("location:".SITE.'admin/admin-profile.php');
                    } else {
                        //Display Error Message
                        $_SESSION['change-pwd'] = "<div class= 'error'><b>Password not changed. Try again. </b></div>";

                        //Redirect the user
                        header("location:".SITE.'admin/admin-profile.php');
                    }
                } else {
                    //Redirect to Admin Profile Page with error message
                    $_SESSION['pwd-not-match'] = "<div class= 'error'><b>Password did not match</b></div>";

                    //Redirect the user
                    header("location:".SITE.'admin/admin-profile.php');
                }
            } else {
                //User does not Exist set message and Redirect
                $_SESSION['user-not-found'] = "<div class= 'error'><b>User not found</b></div>";

                //Redirect Page to User
                header("location:".SITE.'admin/admin-profile.php');
            }
        }
    }
        
        //3.Change password if all above is true
    
 ?>

<?php include("partials/footer.php"); ?>
