<!--php code for taking inputs and storing them into database table map-->
<?php 
      include('connection.php');
      if(isset($_POST['submit']))
      {
        $name=$_POST['name'];
        $lat=$_POST['lat'];
        $lng=$_POST['lng'];
        $location=$_POST['location'];
        $query="INSERT INTO map(name,place_Lat,place_Lng,place_Location) VALUES('$name','$lat','$lng','$location')";
        if(mysqli_query($con,$query)){

        echo"<div class='alert alert-success'>Place inserted in Database</div>";



        }



      }
      ?>