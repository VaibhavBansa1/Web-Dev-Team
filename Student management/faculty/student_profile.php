<?php
    session_start();
    if(!(isset($_SESSION['id']) && $_SESSION['user'] == 'faculty')) {
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
</head>
<body>
    <?php include('../main_nav.php'); ?>
    <h1>Student profile will show here for faculty</h1>
    <?php
    if(isset($_GET['id'])) {
        print_r($_GET['id']) ;
    }
    ?>

</body>
</html>