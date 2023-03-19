<?php
$fullName=$_POST['fullName'];


$email=$_POST['email'];
$number=$_POST['number'];
$message=$_POST['message'];



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
    $stmt=$conn->prepare("insert into contact (fullName,email,number,message) values(?,?,?,?)");
    $stmt->bind_param("ssis",$fullName,$email,$number,$message);
    $stmt->execute();
    echo"<h1>Thanks for contacting with us...</h1>";
    $stmt->close();
    $conn->close();
}


?>
