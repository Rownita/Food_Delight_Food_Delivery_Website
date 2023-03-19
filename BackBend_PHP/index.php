<?php include('partials-front/menu.php'); ?>

        <div class="container">


        <div class="Search-Bar">
            <div class="text-align">

            <form action="<?php echo SITE;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="Button">
            </form>
            </div>
        

            </div>
            </div>

        

        <div class="Cuisines">
        <div class="container">

        <h2 class="text-align">Outstanding Categories</h2>

<?php

//Create SQL Query to display Categories from database

$sql= "SELECT * FROM tbl_category WHERE active='Yes' AND featured='Yes' LIMIT 3";

$res = mysqli_query($conn, $sql);

$count = mysqli_num_rows($res);

if ($count>0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['id'];
        $title = $row['title'];
        $image_name = $row['image_name']; ?>

<a href="<?php echo SITE; ?>category-foods.php?category_id=<?php echo $id; ?>"> 
    <div class="box-3 float-container">
        <?php
        if ($image_name=="") {
            echo "<div class='error'>Image not available</div>";
        } else {
            ?>
            <img src="<?php echo SITE; ?>images/category/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
            <?php
        } ?>


        <h3 class="float-text text-white"><?php echo $title; ?></h3>
    </div>
</a>


        <?php
    }
} else {
    echo "<div class='error'>Categories not added</div>";
}


?>
            
                
                        
        <div class="clearfix"></div> <!--Stopping float of boxes-->

            </div>
            </div>
    <section class="food-menu">        
        <div class="container">

            <h2 class="text-align">Food Menu</h2>


<?php
//Getting foods from database
//SQL query for
$sql2 = "SELECT * FROM tbl_food WHERE active = 'Yes' and featured = 'Yes' LIMIT 6";

$res2 = mysqli_query($conn, $sql2);
$count2 = mysqli_num_rows($res2);

if ($count2>0) {
    while ($row2 = mysqli_fetch_assoc($res2)) {
        $id = $row2['id'];
        $title = $row2['title'];
        $price = $row2['price'];
        $description = $row2['description'];
        $image_name= $row2['image_name']; ?>


<div class="food-menu-box">
    <div class="food-menu-img">
    <?php
        if ($image_name=="") {
            echo "<div class='error'>Image not available</div>";
        } else {
            ?>
            <img src="<?php echo SITE; ?>images/food/<?php echo $image_name; ?>" alt="Pizza" class="img-responsive img-curve">
            <?php
        } ?>
    </div>

    <div class="food-menu-desc">
        <h4><?php echo $title; ?></h4>
        <p class="food-price"><?php echo $price; ?></p>
        <p class="food-detail">
            <?php  echo $description; ?>
        </p>
        <br>

        <a href="<?php echo SITE; ?>order.php?food_id=<?php echo $id; ?>" class="Button">Order Now</a>
    </div>
</div>
        
        <?php
    }
} else {
    echo "<div class='error'>Foods not added</div>";
}
?>



<div class="clearfix"></div>



</div>

<p class="text-align">
<a href="<?php echo SITE; ?>foods.php">See All Foods</a>
</p>
</section>                      
                            
        <div class="clearfix"></div>
            
        </div>

<?php include('partials-front/footer.php'); ?>