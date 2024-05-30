<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time Table</title>
</head>

<body>
    <?php
    include '../main_nav.php';
    if($_SESSION['user'] == "admin") {
        include "../admin/admin_navbar.php";
    } else if ($_SESSION['user'] == "faculty") {
        include "../faculty/faculty_navbar.php";
    } else {
        include '../student/student_navbar.php';
    }
    ?>
    <div class="text-center text-white pt-1 pb-1" style="background-color: #e04747;">
        <h1>Time Table</h1>
    </div>
    <br>
    <div>
        <iframe src="https://drive.google.com/file/d/1rzXKkqt0UoIlLhhZqoIQIg6CJ92eiJrL/preview" width="100%" height="1280" allow="autoplay"></iframe>
    </div>
</body>

</html>