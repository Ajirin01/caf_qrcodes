<?php
require 'db_connect.php'; // Include the database connection file

$codeToken = $_GET['token']; // Get the code token from the query parameters

$stmt = $mysqli->prepare("SELECT * FROM qrcodes WHERE token = ?");
$stmt->bind_param("s", $codeToken);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = $result->fetch_assoc();
    echo json_encode($data);
} else {
    echo "QR code not found for Token: $codeToken";
}
$stmt->close();
?>
