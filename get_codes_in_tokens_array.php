<?php
require 'db_connect.php'; // Include the database connection file

$codeTokens = $_GET['tokens']; // Get the code tokens as an array from the query parameters
$codeTokens = json_decode($codeTokens);

// Construct the query using placeholders for tokens
$placeholders = implode(',', array_fill(0, count($codeTokens), '?'));
$sql = "SELECT * FROM qrcodes WHERE token IN ($placeholders)";

$stmt = $mysqli->prepare($sql);

if ($stmt) {
    // Bind tokens as parameters
    $stmt->bind_param(str_repeat('s', count($codeTokens)), ...$codeTokens);

    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($data);
    } else {
        echo "No QR codes found for the given tokens.";
    }

    $stmt->close();
} else {
    echo "Error in preparing the query: " . $mysqli->error;
}
?>
