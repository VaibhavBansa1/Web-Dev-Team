<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "file_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, name, type FROM files";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {

        echo "<p><a href='download.php?id=" . $row['id'] . "'>" . $row['name'] . "</a></p>";
    }
} else {
    echo "No files found.";
}

$conn->close();
?>
