<?php 
// start session 
session_start();


//create constants to store non-repeating values
define ('SITEURL', 'http://localhost/food-order/Food%20Order%20Application/');
define('LOCALHOST', 'localhost');
define ('DB_USERNAME', 'root');
define ('DB_PASSWORD', '');
define ('DB_NAME', 'food-order');

$conn = mysqli_connect(LOCALHOST, 'root', '') or die (mysqli_error($conn));
$db_select = mysqli_select_db($conn, 'food-order') or die(mysqli_error($conn));
?>