<?php
require 'db_connect.php'; // Include the database connection file

$codeIds = $_POST['ids']; // Get the code IDs as an array from the POST data
$codeIds = json_decode($codeIds);

$inIds = implode(",", $codeIds);

// Mark the codes as printed
$updateSql = "UPDATE qrcodes SET printed = 1 WHERE id IN ($inIds)";
if ($mysqli->query($updateSql)) {
    echo "QR codes updated successfully.";
} else {
    echo "Error updating QR codes: " . $mysqli->error;
}
?>
