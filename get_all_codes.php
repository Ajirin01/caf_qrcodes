<?php
require 'db_connect.php'; // Include the database connection file

$sql = "SELECT * FROM qrcodes";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
   $data = $result->fetch_all(MYSQLI_ASSOC);
//    echo json_encode($data);
    $qrcodes = $data;
} else {
//    echo "No QR codes found.";
    $qrcodes = $data;
}
$result->close();
?>
