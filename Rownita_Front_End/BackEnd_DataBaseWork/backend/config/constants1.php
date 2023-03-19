<?php
//Start Sessions
session_start();
//Create Constants to store Non Repeating values
define('SITE', 'http://localhost/food-delight/');

$conn= mysqli_connect('localhost', 'root', ''); //Database connection
$db_select= mysqli_select_db($conn, 'food-delight');