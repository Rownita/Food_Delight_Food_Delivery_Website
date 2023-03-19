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
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-align">Food Menu</h2>

            <?php
            //Display food that are active
            
            $sql = "SELECT * FROM tbl_food WHERE active ='Yes' ";
        
        $res = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($res);

        if ($count>0) {
            while ($row = mysqli_fetch_assoc($res)) {
                $id = $row['id'];
                $title = $row['title'];
                $price = $row['price'];
                $description = $row['description'];
                $image_name= $row['image_name']; ?>


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
                        <?php echo $description; ?>
                    </p>
                    <br>

                    <a href="<?php echo SITE; ?>order.php?food_id=<?php echo $id; ?>" class="Button">Order Now</a>
                </div>
            </div>
            
                <?php
            }
        } else {
            echo "<div class='error'>Food not found</div>";
        }
        
        ?>

            <div class="clearfix"></div>

            

        </div>

    </section>

<?php include('partials-front/footer.php'); ?>
