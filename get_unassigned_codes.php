<?php
require 'db_connect.php'; // Include the database connection file

$sql = "SELECT * FROM qrcodes WHERE is_assigned = 0";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data);
} else {
    echo "No unassigned QR codes found.";
}
$result->close();
?>
