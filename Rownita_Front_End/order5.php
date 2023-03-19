<!DOCTYPE html>
<html lang="US-en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="This is a web based food delivery system">
    <meta name="keywords" content="fooddelight,FOODDELIGHT,Food delight,FOOD DElIGHT,Restaurant,restaurant,web based restaurant">
    <link  rel="stylesheet" href="css\style.css"   />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    

     

    <title>Order</title>

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
                     <li><a href="order.php">ORDER</a></li>
                     <li><a href="profile.php">PROFILE</a></li>
                        <li><a href="location.php">LOCATION</a></li>
                       <li><a href="contact.php">CONTACT</a></li>
                     <li><a href="about.php">ABOUT</a></li>
                     <li><a href="#">LOG OUT</a></li>
                  
                     </ul>
                     <div class="clearfix"></div>
             </div>

      </div>
      <div class="container">
         
             <h2 class="text-align" style="margin-bottom:-200px;" ><a href="order5.php">Confirm Your Order </a></h2>
           


         
      </div>
      <div>
         <div class="recipe-image"></div>
             
          <img src= "foodrecipies/MargheritaPizza.jpg" style="width:250px ;height:250px;border-radius:50px;margin-left:250px;margin-top:100px;" class="ResponsiveImage" > 
          <p style="margin-left:300px;font-size:30px;color:#756096;">Price:$100</p>   
        </div>
      </div>
      <div   style="margin-left:800PX;margin-top:-300px;">
                <div class="panel-body">
                        <form action='' method="post">
                        <div class="form-group">
                           <label for="quantity" >Quantity</label>
                           <input type="number" class="form-control" id="quantity" name="quantity" style="width:15%"/>

                           </div> 
                      
                          <div class="form-group">

                            <label for="name">Full Name </label>

                            <input type="text" class="form-control" id="firstName" name="firstName" style="width:70%"/>


                          </div>
                         
                         

                          
                           <div class="form-group">
                           <label for="email" >Email</label>
                           <input type="email" class="form-control" id="email" name="email" style="width:70%"/>

                           </div>
                           <div class="form-group">
                            <label for="address" >Address </label>
                           <input type="text" class="form-control" id="address" name="address" style="width:70%"/>

                           </div>
                           <div class="form-group">
                               <label for="number">Phone Number </label>
                            <input type="tel" class="form-control" id="phone" name="phone" style="width:70%"/>

                           </div>

                         <input type="submit" value="Order Now " class="btn btn-primary">

                        </form>
                </div>
         </div>
           <!--Social media section starts from here-->
           <div class ="container" style="margin-top:30px;">
             <div class="SocialMedia">
                 <h2 class="text-align">Follow Us</h2>
                 <ul> 
                     <div class="SocialMediaListType">
                     <div class="text-align">
                      
                     <li><a href="#"><img src="https://img.icons8.com/color/48/fa314a/facebook-circled--v1.png"/></a></li>
                     <li><a href="#"><img src="https://img.icons8.com/color/48/000000/instagram-new--v1.png"/></a></li>
                     <li><a href="#"><img src="https://img.icons8.com/color/48/000000/twitter--v2.png"/></a></li>
                
                   </div>
                     </div>
                 

                   </ul>
         
   </div>
   </div>
   <!--social media section ends here-->
  <!--footer section starts-->

   <div class="container">

     <div id="footer">
         <div class="text-align">
         Copyright &copy;2021 Rownita Tasneem      

         </div>

         </div>
         <!--footer section ends-->

     
     
</body>




</html>
