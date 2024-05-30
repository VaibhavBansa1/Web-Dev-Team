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

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("SELECT name, type, content FROM files WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($name, $type, $content);
    $stmt->fetch();

    header("Content-Disposition: attachment; filename=" . $name);
    header("Content-Type: " . $type);
    echo $content;
}

$conn->close();
?>
