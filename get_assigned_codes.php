<?php
require 'db_connect.php'; // Include the database connection file

$sql = "SELECT * FROM qrcodes WHERE is_assigned = 1";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data);
} else {
    echo "No assigned QR codes found.";
}
$result->close();
?>
