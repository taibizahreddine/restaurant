<?php 

//start session
session_start();

//cfeate constant tostorerepeating values
define('SITEURL','http://localhost/backup/');
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','food-order');


$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error());// database connection
$db_select = mysqli_select_db($conn,DB_NAME) or die(mysqli_error());//  those two lazem yet3awdou ki tebgh t'Afichi 7aja w ge3


?>