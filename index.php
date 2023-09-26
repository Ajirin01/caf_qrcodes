<?php
require 'vendor/autoload.php'; // Include Composer autoloader
require 'db_connect.php';

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

// Define the base URL
$baseUrl = 'https://litcaf.com/c/';

// Function to generate a unique token (you can customize this)
function generateUniqueToken() {
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $token = '';
    $length = 32; // Adjust the length as needed

    for ($i = 0; $i < $length; $i++) {
        $token .= $characters[random_int(0, strlen($characters) - 1)];
    }

    return $token;
}

$number_of_codes_to_generate = 100;

// Create a PNG writer
$writer = new PngWriter();

$message = [];
// Generate and save 10 QR codes
for ($i = 1; $i <= $number_of_codes_to_generate; $i++) {
    // Generate a unique token (you can use any method you prefer)
    $token = generateUniqueToken(); // Implement this function

    // Create the complete URL
    $url = $baseUrl . $token;

    // Create a new QR code instance
    $qrCode = QrCode::create($url)
        ->setSize(300)
        ->setMargin(10);

    // Save the QR code image data as a file with a filename based on the token
    $filename = 'qrcodes/' . $token . '.png';

    $result = $writer->write($qrCode);
    $image = $result->getString();

    // Save the image data to a file
    file_put_contents($filename, $image);

    // Prepare and execute the INSERT statement
    $stmt = $mysqli->prepare("INSERT INTO qrcodes (token, qrcode) VALUES (?, ?)");
    $stmt->bind_param("ss", $token, $filename);

    if ($stmt->execute()) {
        // Insert successful
        array_push($message, "QR code for Token $token generated and saved as $filename");
    } else {
        // Insert failed
        array_push($message, $stmt->error);
    }
}

echo json_encode($message);
?>
