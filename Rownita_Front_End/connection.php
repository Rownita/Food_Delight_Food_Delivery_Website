<?php
$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];

$email=$_POST['email'];
$number=$_POST['number'];
$message=$_POST['message'];
$houseno=$_POST['houseno'];
$roadno=$_POST['roadno'];
$sector=$_POST['sector'];
$block=$_POST['block'];
$area=$_POST['area'];

$postalcode=$_POST['postalcode'];
$city=$_POST['city'];



//connection code
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
    $stmt=$conn->prepare("insert into delivery (firstName,lastName,email,number,message,houseno,roadno,sector,block,area,postalcode,city) values(?,?,?,?,?,?,?,?,?,?,?,?)");//this table delivery relates location feature
    $stmt->bind_param("sssisiiissis",$firstName,$lastName,$email,$number,$message,$houseno,$roadno,$sector,$block,$area,$postalcode,$city);
    $stmt->execute();
    echo"<h1>You will get your delivery soon....</h1>";
    $stmt->close();
    $conn->close();
}


?>
