<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include('../main_nav.php');
    ?>

    <h1>
        Student personal profile
        <?php
            include('logout_btn.php');
            session_start();
            if(!(isset($_SESSION['id']) && $_SESSION['user'] == 'student')){
                header("location:index.php");
            }
        ?>
    </h1>
</body>
</html>