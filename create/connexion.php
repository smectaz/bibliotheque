<?php
$server = "127.0.0.1";
$user = "root";
$pass = '';

// connection

$conn = mysqli_connect($server, $user, $pass);
$base = mysqli_select_db($conn, "bibliotheque");

/* verification
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
echo "connected successfully";*/