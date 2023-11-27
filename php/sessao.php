<?php
$servername = "localhost";
$username = "root";
$password = "EverServer4321";
$dbname = "typing";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$conn->close();

?>