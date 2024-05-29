<?php
session_start();
if(!(isset($_SESSION['id']) && isset($_SESSION['user_id']) && in_array($_SESSION['user'],['admin','faculty']))){
    header("location:../");
    exit;
}
include '../admin_conn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['subject']) &&
isset($_POST['year']) && isset($_POST['sub_code']) && isset($_FILES['file'])) {
    $subject = $_POST['subject'];
    $year = $_POST['year'];
    $sub_code = $_POST['sub_code'];
    $file = $_FILES['file'];

    // File upload path
    $targetDir = "../PYQ/";
    $fileName = basename($file["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

    // Allow certain file formats
    $allowTypes = array('jpg', 'png', 'jpeg', 'pdf', 'doc', 'docx');
    if (in_array($fileType, $allowTypes)) {
        // Upload file to server
        if (move_uploaded_file($file["tmp_name"], $targetFilePath)) {
            // Insert file info into the database
            $insert = $conn->query("INSERT INTO files (subject, year, sub_code, file) VALUES ('$subject', '$year', '$sub_code', '$fileName')");
            if ($insert) {
                echo "
                <script>
                    alert('The file " . $fileName . " has been uploaded successfully.');
                    location.replace('./index.php');
                </script>

                ";
            } else {
                echo "
                <script>
                    alert('File upload failed, please try again.');
                    location.replace('./index.php');
                </script>
                ";
            }
        } else {
            echo "
            <script>
                alert('Sorry, there was an error uploading your file.')
                location.replace('./index.php');
            </script>
            ";
        }
    } else {
        echo "
        <script>
            alert('Sorry, only JPG, JPEG, PNG, PDF, DOC, & DOCX files are allowed to upload.')
            location.replace('./index.php');
        </script>
        ";
    }
} else {
    header('location:./index.php');
    exit;
}

$conn->close();
?>