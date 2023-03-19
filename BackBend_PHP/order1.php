<?php include('partials-front/menu.php'); ?>

<?php
                        //Query to get all Admin
                        $sql = "SELECT * FROM tbl_cart";
                        //Execute the Query
                        $res = mysqli_query($conn, $sql);

                        //Check whether the query is executed or not
                        if ($res == true) {
                            //Count rows to check whether we have data in database or not
                            $count = mysqli_num_rows($res); //Function to get all rows in database
                            
                            //Check the num of rows
                            if ($count>0) {

                                /*We have data in database*/
                                while ($rows = mysqli_fetch_assoc($res)) {
                                    //Using while loop to get all the data from database
                                    //And while loop will run as long as we have data in database

                                    //Get individual data
                                    $id = $rows["id"];
                                    $food = $rows["food"];
                                    $qty = $rows["qty"];
                                    $price = $rows["price"];
                                    $total = $rows["total"];


                                    //Display the values in our table?>
<table>

    <tr>
        <th>Food Name</th>
        <th>Quantity</th>
        <th>Price </th>
        <th>Total</th>
    </tr>


    <tr>
        <td><?php echo $food; ?></td>
        <td><?php echo $qty; ?></td>
        <td><?php echo $price; ?></td>
        <td><?php echo $total; ?></td>
    </tr>
</table>

<?php
                                }
                            } else {
                                //We do not have data in database
                            }
                        }
                     ?>

<!doctype html>
<html lang="en">

<head>
    <title>Delivery</title>
</head>

<body>

    <div style="margin-left:500px">
        <div class="container">
            <div class="row col-md-6 col-md-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <h1>Delivery Information</h1>
                    </div>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <div class="form-group">
                                <label for="Name">Name </label>
                                <input type="text" class="form-control" id="firstName" name="customer_name"
                                    placeholder="Enter Name" required />
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="customer_email"
                                    placeholder="Enter Email" required />
                            </div>
                            <div class="form-group">
                                <label for="number">Phone Number </label>
                                <input type="tel" class="form-control" id="number" name="customer_contact"
                                    placeholder="Enter Phone Number" required />
                            </div>
                            <div class="form-group">
                                <label for="location">Address </label>
                                <input type="text" class="form-control" id="location" name="customer_address"
                                    placeholder="Enter Address" required />
                            </div>


                            <div class align=center><input type="submit" name="submit" class="btn btn-primary"
                                    value="Confirm Order"></div>

                        </form>
                        <br><br>
                    </div>

                    <?php
            //Check whether the submit button is clicked or not

            if (isset($_POST['submit'])) {
                //Get all the details from the form
                $food = ['food'];
                $price = ['price'];
                $qty = ['qty'];
                $total = ['total']; // total = price * quantity
                $order_date = date("Y-m-d h:i:sa"); //Order Date
                $status =  "Ordered"; //ordered, on delivery, delivered, canceled
                $customer_name = $_POST['customer-name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];

                //Save the order in database
                //Create sql to save data
                $sql2 = "INSERT INTO tbl_order SET 
                        food = '$food',
                        price = $price,
                        qty = $qty,
                        total = $total,
                        order_date = '$order_date',
                        status = '$status',
                        customer_name = '$customer_name',
                        customer_contact = '$customer_contact',
                        customer_email = '$customer_email',
                        customer_address = '$customer_address'

                ";
                
                $res2 = mysqli_query($conn, $sql2);
                //check whether query executed or not
                if ($res2==true) {
                    $_SESSION['order'] ="<div class='success text-center'>Food ordered Successfully.</div>";
                    //Redirect to Manage Category Page
                    header("location:".SITE);
                } else {
                    $_SESSION['order'] ="<div class='error text-center'>Failed to order food.</div>";
                    //Redirect to Manage Category Page
                    header("location:".SITE);
                }
            }
            
            ?>
                </div>


                <?php include('partials-front/footer.php'); ?>