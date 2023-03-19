<?php include('partials-front/menu.php'); ?>

<head>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

    <title>Profile</title>


</head>

<body>

    <?php

              $customer_name = $_SESSION["user"];
             
              $sql = "SELECT * FROM tbl_customer WHERE customer_name = '$customer_name'";

              $res = mysqli_query($conn, $sql);

    //Check the query is executed or not
    if ($res==true) {
        //Check whether the data is available or not
        $count = mysqli_num_rows($res);
        //Check whether we have admin data or not
        if ($count==1) {
            //Get the details
            $row=mysqli_fetch_assoc($res);
            
            $id = $row['id'];
            $customer_name = $row['customer_name'];
            $customer_email = $row['customer_email'];
            $customer_contact = $row['customer_contact'];
            $customer_address = $row['customer_address'];
        }
    }
 ?>


    <div class="container">
        <table width="800" cellspacing="">
            <tr>
                <td width="50%">
                    <h2 style="text-align:center">User Profile</h2>
                    <div class="ProfilePic" style="margin-top:20px"></div>
                </td>
                <td valign="middle" width="50%">
                    <table>
                        <tr>
                            <th>Id</th>
                            <td><?php echo $row['id']; ?></td>
                        </tr>
                        <tr>
                            <th>Name</th>
                            <td><?php echo $customer_name; ?></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td><?php echo $customer_email; ?></td>
                        </tr>
                        <tr>
                            <th>Phone Number</th>
                            <td><?php echo $customer_contact; ?></td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td><?php echo $customer_address; ?></td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <a href="<?php echo SITE; ?>edit-profile.php?id=<?php echo $id; ?>"
                                    class="Button2">Edit</a>
                                <a href="<?php echo SITE; ?>delete-account.php?id=<?php echo $id; ?>"
                                    class="Button2">Delete</a>

                            </td>

                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </div>
    </div>
    <!--save,update,delete section ends-->
    <!--Social media section starts from here-->

    <!--social media section ends here-->
    <!--footer section starts-->

    <?php include('partials-front/footer.php'); ?>