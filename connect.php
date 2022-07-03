<?php
// Create connection
header("Allow-Access-Control-Origin: *");
    header("Content-Type: application/json; charset: UTF-8");
    header("Access-Control-Allow-Methods: POST");
    
$conn = mysqli_connect("localhost", "root", "", "inventory");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>
