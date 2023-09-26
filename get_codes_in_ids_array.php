<?php
require 'db_connect.php'; // Include the database connection file

$codeIds = $_GET['ids']; // Get the code IDs as an array from the query parameters
$codeIds = json_decode($codeIds);

$inIds = implode(",", $codeIds);

$sql = "SELECT * FROM qrcodes WHERE id IN ($inIds)";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    $data = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($data);
} else {
    echo "No QR codes found for the given IDs.";
}
$result->close();
?>
