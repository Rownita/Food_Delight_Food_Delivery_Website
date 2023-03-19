<?php include('config/constants1.php');
include('user-login-check.php');
    
?>
<?php
    if(isset($_POST["add_to_cart"])) {  
        if(isset($_SESSION["shopping_cart"]))  
        {  
            
            $item_array_id = array_column($_SESSION["shopping_cart"], "product_id");  
            if(!in_array($_GET["product_id"], $item_array_id)){  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                    'product_id'       =>     $_GET["product_id"],  
                    'product_name'     =>     $_POST["product_name"],  
                    'product_price'    =>     $_POST["product_price"],  
                    'product_quantity' =>     $_POST["product_quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
            }  
            else  
            {  
                    echo '<script>alert("Item Already Added")</script>';  
                    echo '<script>window.location="index.php"</script>';  
            }
        }  
        else  
        {  
            $item_array = array(  
                    'product_id'       =>     $_POST["product_id"],  
                    'product_name'     =>     $_POST["product_name"],  
                    'product_price'    =>     $_POST["product_price"],  
                    'product_quantity' =>     $_POST["product_quantity"]  
            );  
            $_SESSION["shopping_cart"][0] = $item_array;  
        }  
    }
    if(isset($_GET["action"]))  
    {  
        if($_GET["action"] == "delete")  
        {  
            foreach($_SESSION["shopping_cart"] as $keys => $values)  
            {  
                    if($values["product_id"] == $_GET["product_id"])  
                    {  
                        unset($_SESSION["shopping_cart"][$keys]);  
                        echo '<script>alert("Item Removed")</script>';  
                        echo '<script>window.location="cart.php"</script>';  
                    }  
            }  
        }  
    }

?>

<!DOCTYPE html>
<html lang="US-en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="This is a web based food delivery system">
    <meta name="keywords"
        content="fooddelight,FOODDELIGHT,Food delight,FOOD DElIGHT,Restaurant,restaurant,web based restaurant">
    <link rel="stylesheet" href="css/style.css?<?php echo date('h:i:s'); ?>">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">


    <title>Food Delight</title>

</head>





<body>

    <div class="container">
        <!--=========================== cart item ========================================-->
        <?php if ($_SESSION["shopping_cart"]) :?>
        <table class="table table-bordered" style="display:none">
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
                <td>$ <?php echo $values["product_price"]; ?></td>
                <td>$ <?php echo number_format($values["product_quantity"] * $values["product_price"], 2); ?></td>
                <td><a href="index.php?action=delete&product_id=<?php echo $values["product_id"]; ?>"><span
                            class="text-danger">Remove</span></a></td>
            </tr>
            <?php  
                        $total = $total + ($values["product_quantity"] * $values["product_price"]);  
                    }  
                ?>
            <tr>
                <td colspan="3" align="right">Total</td>
                <td align="right">$ <?php echo number_format($total, 2); ?></td>
                <td></td>
            </tr>
            <?php  
                }  
                ?>
        </table>
        <?php endif; ?>
        <!-- navbart start -->
        <div id="Navigation-bar">

            <div id="FoodDelightLogo">
                <a href="index.php" target="_blanks"></a>
                <img src="homepagephotos\FinalLogo.PNG" alt="Food Delight Logo">
            </div>
        </div>



        <div class="NavigationLinks Text-Align ">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="categories.php">CATEGORIES</a></li>
                <li><a href="foods.php">FOODS</a></li>
                <li><a href="profile.php">PROFILE</a></li>
                <li><a href="cart.php">CART</a></li>
                <li><a href="about.php">ABOUT </a></li>
                <li><a href="user-logout.php">LOGOUT</a></li>

            </ul>
            <div class="clearfix"></div>
        </div>

    </div>
