<?php
$servername = "localhost";
$username = "root";  // Change to your database username
$password = "mysql";  // Change to your database password
$dbname = "file_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload File</title>
</head>
<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Choose file:</label>
        <input type="file" name="file" id="file" required>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
