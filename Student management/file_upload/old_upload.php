<?php
$servername = "localhost";
$username = "root";  // Change to your database username
$password = "";  // Change to your database password
$dbname = "file_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];
    print_r($_FILES);
    // Get file details
    $name = $file['name'];
    $type = $file['type'];
    $size = $file['size'];
    $content = file_get_contents($file['tmp_name']);

    // Prepare and execute the SQL query
    $stmt = $conn->prepare("INSERT INTO files (name, type, size, content) VALUES (?, ? ,? ,?)");
    $stmt->bind_param("ssis", $name, $type, $size, $content);

    if ($stmt->execute()) {
        echo "File uploaded successfully.";
    } else {
        echo "File upload failed.";
    }
    $stmt->close();
}

$conn->close();
?>
