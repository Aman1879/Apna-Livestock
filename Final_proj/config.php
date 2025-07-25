<?php
$servername = "127.0.0.1";   // Use 127.0.0.1 instead of localhost
$username = "root";           // Default XAMPP username is root
$password = "";               // Default XAMPP password is empty
$dbname = "livestock_management";  // Your database name
$port = 3306;                 // Default MySQL port

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Connection successful
    // echo "Connected successfully";  
}
?>
