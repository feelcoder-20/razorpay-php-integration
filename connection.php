<?php

$servername = "127.0.0.1:3306";
$username = "root"; // use username of your database[hint: root]
$password = "";
$dbname="";  // use database name

// Create connection
$conn = mysqli_connect($servername, $username, $password,$dbname);

// Check connection
if (!$conn) 
  die("Connection failed: " . mysqli_connect_error());
else
 echo "hii";


?>

