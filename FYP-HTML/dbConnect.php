<?php
$hostname = "localhost";
$username = "root";
$pwd = "root";
$db = "excel_data_pen";

// Create connection
$conn = mysqli_connect($hostname, $username, $pwd, $db);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
