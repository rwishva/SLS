<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "mc";

// Create connection
$conn = mysqli_connect($servername,$username,$password);

// Check connection
if (!$conn) {
    die("Connection failed: " . $conn->connect_error);
}
$db_select = mysqli_select_db($conn,$database);
//echo "Connected successfully";

?>