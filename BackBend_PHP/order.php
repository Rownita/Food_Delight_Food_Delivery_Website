<?php include('partials-front/menu.php'); ?>

<?php

//Check whether food id is set or not

if (isset($_GET['food_id'])) {
    $food_id = $_GET['food_id'];
    //Get the food id and details of the selected food
    //Get the details of the selected food

    $sql = "SELECT * FROM tbl_food WHERE id = $food_id";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($res);
   

    if ($count==1) {
        //We have data
        $row=mysqli_fetch_assoc($res);
        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    } else {
        //food not available
        //Redirect to homepage
        header('Location:'.SITE);
    }
} else {
    //Redirect to homepage
    header('Location:'.SITE);
}

?>

<title>Order</title>
<link rel="stylesheet" href="./css/user-order.css">
<link rel="stylesheet" href="./css/style.css">

</head>



<!-- fOOD sEARCH Section Starts Here -->

<div class="container">

    <h2 class="text-align">Fill this form to confirm your order</h2>

    <form action="" method="POST" class="order">
        <fieldset>
            <legend class="text-align"><b>Selected Food</b></legend>

            <div class="food-menu-img">
                <?php
                            if ($image_name=="") {
                                echo "<div class='error'>Image not available</div>";
                            } else {
                                ?>
                <img src="<?php echo SITE; ?>images/food/<?php echo $image_name; ?>" alt="Pizza"
                    class="img-responsive img-curve">
                <?php
                            } ?>
            </div>

            <div class="food-menu-desc">
                <h3><?php echo $title; ?></h3>

                <input type="hidden" name="food" value="<?php echo $title; ?>">

                <p class="food-price" id='showPrice'></p>
                <input type="hidden" name="price" value="<?php echo $price; ?>" id="price">
                <div class="order-label">Quantity</div>
                <input type="number" name="qty" class="input-responsive" value="1" required id='quantity'>
            </div>
            <!-- java script code for price calculation -->
            <script>
            price = document.getElementById("price");
            showPrice = document.getElementById("showPrice");
            quantity = document.getElementById("quantity");
            showPrice.innerHTML = price.value;
            quantity.onchange = function() {
                calPrice()
            };

            function calPrice() {
                showPrice.innerHTML = price.value * quantity.value
            }
            </script>

        </fieldset>

        <fieldset>
            <legend class="text-align"><b>Delivery Details</b></legend>
            <div class="order-label"><b>Name</b></div>
            <input type="text" name="customer-name" placeholder="Name" class="input-responsive" required>

            <div class="order-label"><b>Phone Number</b></div>
            <input type="tel" name="contact" placeholder="01*********" class="input-responsive" required>

            <div class="order-label"><b>Email</b></div>
            <input type="email" name="email" placeholder="Email" class="input-responsive" required>

            <div class="order-label"><b>Address</b></div>
            <textarea name="address" rows="10" placeholder="Address" class="input-responsive" required></textarea>
            <br><br>
            <div class="text-align">
                <input type="submit" name="submit" value="Confirm Order" class="Button">
            </div>

        </fieldset>

    </form>

    <?php
            //Check whether the submit button is clicked or not

            if (isset($_POST['submit'])) {
                //Get all the details from the form
                $food = $_POST['food'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
                $total = $price * $qty; // total = price * quantity
                $order_date = date("Y-m-d h:i:sa"); //Order Date
                $status =  "Ordered"; //ordered, on delivery, delivered, canceled
                $customer_name = $_POST['customer-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address = $_POST['address'];

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