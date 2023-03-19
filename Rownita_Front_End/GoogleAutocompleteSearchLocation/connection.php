<?php

$servername="localhost";
$username="root";
$dbpass="";
$dbname="food-delight";
$conn =new mysqli($servername,$username,$dbpass,$dbname);
if($conn->connect_error){

 die("Connection Failed".$conn->connect_error);


}
else{

    //echo"connected";
}


?>