<?php
$servername = "localhost";
$username = "root";
$password = "";
$db="nada";
// Create connection
$conn = new mysqli($servername, $username, $password,$db);

if ($conn->connect_errno) {
    die("error conection");
}
error_reporting(0);
?>

