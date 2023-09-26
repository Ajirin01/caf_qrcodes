<?php
require 'db_connect.php'; // Include the database connection file

$codeId = $_GET['id']; // Get the code ID from the query parameters

$stmt = $mysqli->prepare("SELECT * FROM qrcodes WHERE id = ?");
$stmt->bind_param("i", $codeId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo json_encode($data);
} else {
    echo "QR code not found for ID: $codeId";
}
$stmt->close();
?>
