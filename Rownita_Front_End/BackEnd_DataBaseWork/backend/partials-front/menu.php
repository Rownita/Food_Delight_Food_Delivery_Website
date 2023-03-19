<?php include('config/constants.php');
    include('user-login-check.php');
?>

<!DOCTYPE html>
<html lang="US-en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="This is a web based food delivery system">
    <meta name="keywords"
        content="fooddelight,FOODDELIGHT,Food delight,FOOD DElIGHT,Restaurant,restaurant,web based restaurant">
    <link rel="stylesheet" href="css\style.css" />



    <title>Food Delight</title>

</head>





<body>

    <div class="container">

        <div id="Navigation-bar">

            <div id="FoodDelightLogo">
                <img src="homepagephotos\FinalLogo.PNG" alt="Food Delight Logo">


            </div>
        </div>



        <div class="NavigationLinks Text-Align ">
            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="categories.php">CATEGORIES</a></li>
                <li><a href="foods.php">FOODS</a></li>
                <li><a href="profile.php">PROFILE</a></li>
                <li><a href="order.php">ORDER</a></li>
                <li><a href="about.php">ABOUT </a></li>
                <li><a href="user-logout.php">LOGOUT</a><?php  if (isset($_SESSION['username'])) : ?>
    	<h3>Welcome <strong><?php echo $_SESSION['username']; ?></strong></h3>
    	 
    <?php endif ?></li>

            </ul>
            <div class="clearfix"></div>
        </div>

    </div>
   