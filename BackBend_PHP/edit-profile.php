<?php include('partials-front/menu.php'); ?>

<head>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <?php
    //Check whether the submit button is clicked or not
if (isset($_POST['submit'])) {
    
    //Get all the values from form to update
    $id = $_POST['id'];
    $customer_name = $_POST['customer_name'];
    $customer_contact = $_POST['customer_contact'];
    $customer_email = $_POST['customer_email'];
    $customer_address = $_POST['customer_address'];
    //Create a sql Query to update Admin
    $sql ="UPDATE tbl_customer SET 
    
    customer_name = '$customer_name',
    customer_contact = '$customer_contact',
    customer_email = '$customer_email',
    customer_address = '$customer_address'
    WHERE id = '$id'
    ";
    //Execute the Query
    $res = mysqli_query($conn, $sql);

    if ($res==true) {
        //Query executed and user updated
        $_SESSION['edit'] = "<div class= 'success'><b>Account updated Successfully</b></div>";
        $_SESSION["user"] = $customer_name;
        //Redirect Page to Profile
        header("location:".SITE.'profile.php');
    } else {
        //Failed to update user
        $_SESSION['edit'] = "<div class= 'error'><b>Failed to update Account</b></div>";

        //Redirect Page to   Profile
        header("location:".SITE.'profile.php');
    }
}
?>

    <div style="margin-left:500px;margin-top:50px;">
        <div class="container">
            <div class="row col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <h1>Update Profile</h1>
                    </div>
                    <?php
                //1.Get the ID of selected Admin
                $id = $_GET['id'];
                //2.Create SQL Query to get the details
                $sql = "SELECT * FROM tbl_customer WHERE id=$id";

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
                        $customer_name = $row['customer_name'];
                        $customer_email = $row['customer_email'];
                        $customer_contact = $row['customer_contact'];
                        $customer_address = $row['customer_address'];
                    } else {
                        //Redirect to Admin Profile Page
                        header("location:".SITE.'profile.php');
                    }
                }
 ?>
                    <div class="panel-body" style="margin-top:50px;">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="fullName">Name </label>
                                <input type="text" class="form-control" id="fullName" name="customer_name"
                                    placeholder="Enter Name" value="<?= $customer_name;?>" />
                            </div>


                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="customer_email"
                                    placeholder="Enter Email" value="<?= $customer_email;?>" />
                            </div>

                            <div class="form-group">
                                <label for="number">Phone </label>
                                <input type="text" class="form-control" id="number" name="customer_contact"
                                    placeholder="Enter Phone" value="<?= $customer_contact;?>" />
                            </div>
                            <div class="form-group">
                                <label for="location">Address </label>
                                <input type="text" class="form-control" id="location" name="customer_address"
                                    placeholder="Enter Address" value="<?= $customer_address;?>" />
                            </div>
                            <td><input type="hidden" name="id" value="<?php echo $id; ?>"></td>
                            <input type="submit" name="submit" class="btn btn-primary" value="Update">
                            <a href="<?php echo SITE; ?>change-password.php?id=<?php echo $id; ?>"
                                class="btn btn-primary">Change
                                Password</a>
                        </form>
                    </div>
                </div>
                <?php include('partials-front/footer.php'); ?>