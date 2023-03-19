<!DOCTYPE html>
<html lang="US-en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="description" content="This is a web based food delivery system">
    <meta name="keywords" content="fooddelight,FOODDELIGHT,Food delight,FOOD DElIGHT,Restaurant,restaurant,web based restaurant">
    <link  rel="stylesheet" href="css\style.css">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">  
  
     <title>Profile</title>
   

    </head>
    <body>
    <div class="container">
        
        <div id="Navigation-bar">
 
            <div id="FoodDelightLogo">
               <img src="homepagephotos\FinalLogo.PNG" alt="Food Delight Logo">
              
         
            </div>
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
                        <li><a href="about.php">ABOUT </a></li>
                     
                        <li><a href="#">LOG OUT</a></li>

                        </ul>
                        <div class="clearfix"></div>
                </div>

         </div>
         <div class="container">
         <span class="text-align"><h2>User Profile</h2></span>

         </div>
                     
            <div class="ProfilePic" style="margin-left:220px;">                       
               <input type="file" class="my_file ">
                               
                </div>
              <div   style="margin-left:800PX;margin-top:-300px;">
                <div class="panel-body">
                        <form action=' 'method="post">
                          <div class="form-group col-xs-5">

                            <label for="firstName">Customer Name </label>

                            <input type="text" class="form-control" id="firstName" name="firstName" style="width:70%" required/>


                          </div>
                        
                        
                           <div class="form-group">
                           <label for="email" >Email</label>
                           <input type="email" class="form-control" id="email" name="email" style="width:70%" required>

                           </div>
                           <div class="form-group">
                            <label for="location" >Address </label>
                           <input type="text" class="form-control" id="location" name="location" style="width:70%" required/>

                           </div>
                           <div class="form-group col-xs-5">

                             <label for="pass_No">Password</label>

                              <input type="password" class="form-control" id="pass_No" name="pass_No" style="width:70%" required/>


                              </div>
            
                           <div class="form-group">
                               <label for="phone">Phone Number </label>
                            <input type="tel" class="form-control" id="phone" name="phone" style="width:70%" required/>

                           </div>
                        

                         <input type="Submit" class="btn btn-primary">
                        
                         <input type="button"  value="Delete"class="btn btn-primary">
                        </form>
                 </div>
                 </div>
                  </form>
</div></div>
               
                
                <!--save,update,delete section ends-->
                  <!--Social media section starts from here-->
                <div class ="container">
                    <div class="SocialMedia" style="margin-top:80px">
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
