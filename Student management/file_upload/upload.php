<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $subject = $_POST['subject'];
    $year = $_POST['year'];
    $session = $_POST['session'];
    $file = $_FILES['file'];

    // File upload path
    $targetDir = "uploads/";
    $fileName = basename($file["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'pdf', 'doc', 'docx');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
            // Insert file info into the database
            $insert = $conn->query("INSERT INTO files (subject, year, session, file) VALUES ('$subject', '$year', '$session', '$fileName')");
            if ($insert) {
                echo "The file " . $fileName . " has been uploaded successfully.";
            } else {
                echo "File upload failed, please try again.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG, GIF, PDF, DOC, & DOCX files are allowed to upload.";
    }
}

$conn->close();
?>