<?php include('partials-front/menu.php');

 ?>
<?php
            //Check whether the submit button is clicked or not
             $confirmed ='';
            if (isset($_POST['confirm-order'])) {
                
                $customer_name = $_POST['customer_name'];
                $customer_contact = $_POST['customer_contact'];
                $customer_email = $_POST['customer_email'];
                $customer_address = $_POST['customer_address'];
                $sql2 = "INSERT INTO tbl_order(customer_name,customer_email,customer_mobile,customer_address) values('$customer_name',' $customer_contact','$customer_email','$customer_address')";
                $res2 = mysqli_query($conn, $sql2);
                if ($res2) {
                  
                  $order_id = mysqli_insert_id($conn);
                  if(!empty($_SESSION["shopping_cart"]))  
                    {    
                        foreach($_SESSION["shopping_cart"] as $keys => $values)  
                        { 
                            $sql2 = "INSERT INTO tbl_order_details(order_id,product_id,product_quantity) values('$order_id','$values[product_id]','$values[product_quantity]')";
                            $res2 = mysqli_query($conn, $sql2);
                        }
                    }
                    unset($_SESSION["shopping_cart"]);
                 $confirmed = 'Your order has been confirmed successfully';
            
                } else {
                     echo 'unsucess';
                }
            }
            
            ?>

<div class="container" style="text-align:center;min-height:400px;">
    <h1>Cart</h1>
    <?php if (!empty($_SESSION["shopping_cart"])) :?>
    <table class="table table-bordered">
        <tr>
            <th width="40%">Item Name</th>
            <th width="10%">Quantity</th>
            <th width="20%">Price</th>
            <th width="15%">Total</th>
            <th width="5%">Action</th>
        </tr>
        <?php   
                if(!empty($_SESSION["shopping_cart"]))  
                {  
                    $total = 0;  
                    foreach($_SESSION["shopping_cart"] as $keys => $values)  
                    {  
                ?>
        <tr>

            <td><?php echo $values["product_name"]; ?></td>
            <td><?php echo $values["product_quantity"]; ?></td>
            <td><?php echo $values["product_price"]; ?></td>
            <td><?php echo number_format($values["product_quantity"] * $values["product_price"], 2); ?></td>
            <td><a href="index.php?action=delete&product_id=<?php echo $values["product_id"]; ?>"><span
                        class="text-danger">Remove</span></a></td>
        </tr>
        <?php  
                        $total = $total + ($values["product_quantity"] * $values["product_price"]);  
                    }  
                ?>
        <tr>
            <td colspan="3" align="right">Total</td>
            <td align="right"><?php echo number_format($total, 2); ?></td>
            <td></td>
        </tr>
        <?php  
                }  
                ?>
    </table>
    <div class="row mt-5">
        <div class="col-6 text-left">
            <h2>Please confirm your addres for delivery</h2>
        </div>
        <div class="col-6 text-left">
            <h1>Delivery information</h1>
            <form action="" method="POST">
                <div class="form-group">
                    <label for="Name">Name </label>
                    <input type="text" class="form-control" id="firstName" name="customer_name" placeholder="Enter Name"
                        required />
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="customer_email" placeholder="Enter Email"
                        required />
                </div>
                <div class="form-group">
                    <label for="number">Phone Number </label>
                    <input type="text" class="form-control" id="number" name="customer_contact"
                        placeholder="Enter Phone Number" required />
                </div>
                <div class="form-group">
                    <label for="location">Address </label>
                    <input type="text" class="form-control" id="location" name="customer_address"
                        placeholder="Enter Address" required />
                </div>
                <div class align=center><input type="submit" name="confirm-order" class="btn btn-primary"
                        value="Confirm Order">
                </div>
            </form>
        </div>
    </div>
    <?php else: ?>
    <?php if($confirmed): ?>
    <h2><?= $confirmed; ?></h2>

    <?php else: ?>
    <h2>Cart is empty</h2>
    <?php endif; ?>
    <?php endif; ?>
</div>

<?php include('partials-front/footer.php'); ?>
