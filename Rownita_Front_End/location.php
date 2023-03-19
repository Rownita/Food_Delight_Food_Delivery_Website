
<!doctype html>
<html lang="en">
  <head>
    <title>Location</title>
    <!-- Required meta tags -->
    <meta name="description" content="This is a web based food delivery system">
    <meta name="keywords" content="fooddelight,FOODDELIGHT,Food delight,FOOD DElIGHT,Restaurant,restaurant,web based restaurant">
    <link  rel="stylesheet" href="css\style.css"   />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
    integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
    crossorigin=""/>
     <!-- Make sure you put this AFTER Leaflet's CSS -->
 <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
 integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
 crossorigin=""></script>
      <style>
          #mapid { height: 200px; }

      </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                       <li><a href="location.php">LOCATION</a></li>
                       <li><a href="contact.php">CONTACT</a></li>
                       <li><a href="about.php">ABOUT</a></li>
                        <li><a href="#">LOG OUT</a></li>

                        </ul>
                        <div class="clearfix"></div>
                </div>

         </div>
         <div style="margin-left:500px">
         <div class="container">
             <div class="row col-md-6 col-md-offset-3">
                 <div class="panel panel-primary">
                   <div class="panel-heading text-center">

                   <h1>Your  Information & Check Our Location</h1>

                   </div>
                    <div class="panel-body">
                        <form  action="connection.php" method="post">
                          <div class="form-group">

                            <label for="firstName">First Name </label>

                            <input type="text" class="form-control" id="firstName" name="firstName"/>


                          </div>
                          <div class="form-group">

                            <label for="LastName">Last Name </label>

                            <input type="text" class="form-control" id="lastName" name="lastName"/>


                          </div>
                          

                          
                           <div class="form-group">
                           <label for="email" >Email</label>
                           <input type="email" class="form-control" id="email" name="email">

                           </div>
                           <div class="form-group">
                           <label for="houseno" >House#</label>
                           <input type="number" class="form-control" id="houseno" name="houseno" style="width:40%;height:2%;">
                           <label for="roadno" >Road#</label>
                           <input type="number" class="form-control" id="roadno" name="roadno" style="width:40%;height:2%;">
                           
                           <label for="sector" >Sector#</label>
                           <input type="number" class="form-control" id="sector" name="sector" style="width:40%;height:2%;">
                           <label for="block" >Block</label>
                           <select name="block" class="form-control" id="block" name="block" style="width:40%;height:2%;">
                            <option value="A" class="form-control" id="block" name="block" >A</option>
                            <option value="B" class="form-control" id="block" name="block" >B</option>
                            <option value="C" class="form-control" id="block" name="block" >C</option>
                            <option value="D" class="form-control" id="block" name="block" >D</option>
                            <option value="E" class="form-control" id="block" name="block" >E</option>
                            <option value="F" class="form-control" id="block" name="block" >F</option>
                            <option value="G" class="form-control" id="block" name="block" >G</option>
                            <option value="H" class="form-control" id="block" name="block" >H</option>
                            <option value="I" class="form-control" id="block" name="block" >I</option>
                            <option value="J" class="form-control" id="block" name="block" >J</option>
                            <option value="K" class="form-control" id="block" name="block" >K</option>
                            <option value="L" class="form-control" id="block" name="block" >L</option>
                            <option value="M" class="form-control" id="block" name="block" >M</option>
                            <option value="N" class="form-control" id="block" name="block" >N</option>
                            <option value="O" class="form-control" id="block" name="block" >O</option>
                            <option value="P" class="form-control" id="block" name="block" >P</option>
                            <option value="Q" class="form-control" id="block" name="block" >Q</option>
                            <option value="R" class="form-control" id="block" name="block" >R</option>
                            <option value="S" class="form-control" id="block" name="block" >S</option>
                            <option value="T" class="form-control" id="block" name="block" >T</option>
                            <option value="U" class="form-control" id="block" name="block" >U</option>
                            <option value="V" class="form-control" id="block" name="block" >V</option>
                            <option value="W" class="form-control" id="block" name="block" >W</option>
                            <option value="X" class="form-control" id="block" name="block" >X</option>
                            <option value="Y" class="form-control" id="block" name="block" >Y</option>
                            <option value="Z" class="form-control" id="block" name="block" >Z</option>
                             
                             
                        
     

                            </select>
                          
                           <label for="area" >Area Name</label>
                           <input type="text" class="form-control" id="area" name="area" style="width:40%;height:2%;"> 
                           <label for="postalcode" >Postal Code</label>
                           <input type="number" class="form-control" id="postalcode" name="postalcode" style="width:40%;height:2%;">
                            <label for="city"  >City </label>
                          
                            <select name="city" class="form-control" id="road" name="road" style="width:40%;height:2%;">
                            <option value="Dhaka" class="form-control" id="city" name="city" >Dhaka</option>
                            <option value="Rajshahi" class="form-control" id="city" name="city">Rajshahi</option>
                            <option value="Chittagong" class="form-control" id="city" name="city">Chittagong</option>
                            <option value="Khulna" class="form-control" id="city" name="city">Khulna</option>
                            <option value="Sylhet" class="form-control" id="city" name="city">Sylhet</option>
                            <option value="Rajshahi" class="form-control" id="city" name="city">Rajshahi</option>
                            <option value="Barisal" class="form-control" id="city" name="city">Barisal</option>
                            <option value="Rangpur" class="form-control" id="city" name="city">Rangpur</option>
                            <option value="Comilla" class="form-control" id="city" name="city">Comilla</option>
                            <option value="Narayanganj" class="form-control" id="city" name="city">Narayanganj</option>
                            <option value="Comilla" class="form-control" id="city" name="city">Comilla</option>
     

                            </select>
                           </div>
                           <div class="form-group">
                               <label for="number">Phone Number </label>
                            <input type="tel" class="form-control" id="number" name="number"/>

                           </div>
                           <div class="form-group">
                            <label for="message" >Your Message</label>
                            
                          <textarea cols="4" rows="4" class="form-control" id="message" name="message" style="width:100%;height:100%;" ></textarea>
    
                           </div>

                         <input type="submit" class="btn btn-primary" value="Send" style="margin-bottom:10px;">

                        </form>
                 </div>
                 </div>
                 <div class="container"id="mapid">
           

           </div>
        
    <div id="mapid" style="width: 800px; height: 500px;margin-top:100px;margin-left:-200px;"></div>
    <script>
    
    var mymap = L.map('mapid').setView([51.505, -0.09], 13);
    
      L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
        maxZoom: 18,
        attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, ' +
          'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
        id: 'mapbox/streets-v11',
        tileSize: 512,
        zoomOffset: -1
      }).addTo(mymap);
    
      L.marker([51.5, -0.09]).addTo(mymap)
        .bindPopup("<b>Here is location of food-delight!</b><br />.").openPopup();
    
      L.circle([51.508, -0.11], 500, {
        color: 'red',
        fillColor: '#f03',
        fillOpacity: 0.5
      }).addTo(mymap).bindPopup("I am a circle.");
    
      L.polygon([
        [51.509, -0.08],
        [51.503, -0.06],
        [51.51, -0.047]
      ]).addTo(mymap).bindPopup("I am a polygon.");
    
    
      var popup = L.popup();
    
      function onMapClick(e) {
        popup
          .setLatLng(e.latlng)
          .setContent("You clicked the map at " + e.latlng.toString())
          .openOn(mymap);
      }
    
      mymap.on('click', onMapClick);
    
    </script>
                  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
              

    <div class ="container" style="margin-top:-600px;">
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



    <div class="container" style="margin-top:-500px;">

<div id="footer">
    <div class="text-align">
    Copyright &copy;2021 Rownita Tasneem      

    </div>

    </div>
  </div>
      


</body>
</html>
