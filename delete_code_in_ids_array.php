<?php
require 'db_connect.php'; // Include the database connection file

$codeIds = $_POST['ids']; // Get the code IDs as an array from the POST data
$codeIds = json_decode($codeIds);

$inIds = implode(",", $codeIds);

// Delete the codes
$deleteSql = "DELETE FROM qrcodes WHERE id IN ($inIds)";
if ($mysqli->query($deleteSql)) {
    echo "QR codes deleted successfully.";
} else {
    echo "Error deleting QR codes: " . $mysqli->error;
}
?>
