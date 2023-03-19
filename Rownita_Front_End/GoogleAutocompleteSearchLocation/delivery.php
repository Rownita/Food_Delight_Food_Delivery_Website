<?php
include ('db.php');

?>
    <!DOCTYPE html>
    <html lang="US-en">
    
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
        <meta name="description" content="This is a web based food delivery system">
        <meta name="keywords" content="fooddelight,FOODDELIGHT,Food delight,FOOD DElIGHT,Restaurant,restaurant,web based restaurant">
        <link  rel="stylesheet" href="css\style.css"   />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDk31mAQt1QX6d6UeKef89juUSYz20rVvk&libraries=places&callback=initMap" ></script>
        <script src="index.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <title>Food Delight</title>
        <style>
              
          /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#map {
  height: 100%;
}

/* Optional: Makes the sample page fill the window. */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}

#description {
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
}

#infowindow-content .title {
  font-weight: bold;
}

#infowindow-content {
  display: none;
}

#map #infowindow-content {
  display: inline;
}

.pac-card {
  margin: 10px 10px 0 0;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
  background-color: #fff;
  font-family: Roboto;
}

#pac-container {
  padding-bottom: 12px;
  margin-right: 12px;
}

.pac-controls {
  display: inline-block;
  padding: 5px 11px;
}

.pac-controls label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}

#pac-input {
  background-color: #fff;
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
  margin-left: 12px;
  padding: 0 11px 0 13px;
  text-overflow: ellipsis;
  width: 400px;
}

#pac-input:focus {
  border-color: #4d90fe;
}

#title {
  color: #fff;
  background-color: #4d90fe;
  font-size: 25px;
  font-weight: 500;
  padding: 6px 12px;
}
    
 input[type=text]{

width: 50%;
padding: 5px 8px;
margin-left:25px;
box-sizing: border-box;
border: 2px whitesmoke;
border-radius: 4px;
background-color:whitesmoke;
color:black;


}

    
            </style>
    
    
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
                           <li><a href="delivery.php">DELIVERY</a></li>
                           <li><a href="about.php">ABOUT </a></li>
                            <li><a href="#">LOG OUT</a></li>
    
                            </ul>
                            <div class="clearfix"></div>
                    </div>
    
             </div>

             
             <div class="container">
                <p style="color:blue;font-size:30px;margin-left:400px;">SET YOUR DELIVERY LOCATION</p>
   
             </div>
             <div class="container">
              <form method=post>
              <div style="margin-bottom:20px;margin-left:400px;" >

               <label for="fullName" > <p style="color:blue;font-size: 30px;margin-left:-10px;">Customer Name</p></label>
               <input type="text" name="fullName" id="fullName" style="margin-left:-9px;"required>
              </div>
              <div class="pac-card" id="pac-card">
      <div>
        <div id="title">Autocomplete search</div>
        <div id="type-selector" class="pac-controls">
          <input
            type="radio"
            name="type"
            id="changetype-all"
            checked="checked"
          />
          <!--codes for taking hidden inputs for latitude and longitude-->
          <input type="hidden" name="lat" id="lat">
          <input type="hidden" name="lng" id="lng">
          <input type="hidden" name="location" id="location">
          
          <label for="changetype-all">All</label>
        
          <input type="radio" name="type" id="changetype-establishment" />
          <label for="changetype-establishment">Establishments</label>

          <input type="radio" name="type" id="changetype-address" />
          <label for="changetype-address">Addresses</label>

          <input type="radio" name="type" id="changetype-geocode" />
          <label for="changetype-geocode">Geocodes</label>
        </div>
        <br />
        <div id="strict-bounds-selector" class="pac-controls">
          <input type="checkbox" id="use-location-bias" value="" checked />
          <label for="use-location-bias">Bias to map viewport</label>

          <input type="checkbox" id="use-strict-bounds" value="" />
          <label for="use-strict-bounds">Strict bounds</label>
        </div>
      </div>
      <div id="pac-container">
        <input id="pac-input" type="text" placeholder="Enter a location" />
      </div>
    </div>
    <div id="map" style="margin-left:400px;height:400px;width:500px;"></div><!--Styling the map-->
    <div id="infowindow-content">
      <span id="place-name" class="title"></span><br />
      <span id="place-address"></span>
    </div>   <!--Creating submit button-->
             <input type="submit" name="submit" value="Save" class="Button" style="margin-left:600px;margin-top:20px;" >

              </form>

             </div>
        
        <div class ="container"  style="margin-left:100px;">>
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

      <div id="footer">
          <div class="text-align">
          Copyright &copy;2021 Rownita Tasneem      

          </div>

          </div>
        </div>
            
     

               
     
    </body>
    </html>