<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "litcaf_qrcodes";

// Create a MySQLi connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

?>