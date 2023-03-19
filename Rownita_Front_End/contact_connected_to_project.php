<?php include('partials-front/menu.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Contact</title>
    <!-- Required meta tags -->
    <meta name="description" content="This is a web based food delivery system">
    <meta name="keywords" content="fooddelight,FOODDELIGHT,Food delight,FOOD DElIGHT,Restaurant,restaurant,web based restaurant">
    <link  rel="stylesheet" href="css\style.css"   />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
  
         <div style="margin-left:500px">
         <div class="container">
             <div class="row col-md-6 col-md-offset-3">
                 <div class="panel panel-primary">
                   <div class="panel-heading text-center">
                   <h1>Contact Us</h1>
                   </div>
                    <div class="panel-body">
                        <form action="connection2.php" id="contact-form"method="post">
                          <div class="form-group">
                            <label for="fullName">Full Name </label>
                            <input type="text" class="form-control" id="fullName" name="fullName" style="width:200%" required/>
                          </div>
                          
                          
                          </div>
                           <div class="form-group">
                           <label for="email" >Email</label>
                           <input type="email" class="form-control" id="email" name="email"style="width:200%" />
                           </div>
                           
                           <div class="form-group">
                               <label for="number">Phone Number </label>
                            <input type="number" class="form-control" id="number" name="number" style="width:200%" />
                           </div>
                           <div class="form-group">
                            <label for="message" >Write a Review</label>
                            
                          <textarea cols="4" rows="4" class="form-control" id="message" name="message" style="width:200%;height:200%;" ></textarea>
    
                           </div>
                        
                         <input type="submit" class="btn btn-primary" value="submit">
                        </form>
                 </div>
                 </div>
                 <div class ="container" style="margin-left:-200px">
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
    <div class="container">
<div id="footer" style="margin-left:-330px;">
    <div class="text-align">
    Copyright &copy;2021 Rownita Tasneem      
    </div>
    </div>
  </div>
      
   
 
</body>
</html>
