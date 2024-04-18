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
        include('Faculty_navbar.php');
    ?>

    <h1>
        Faculty personal profile
    </h1>
        <?php
            session_start();
            if(!(isset($_SESSION['id']) && $_SESSION['user'] == 'faculty')){
                header("location:index.php");
            }
        ?>
</body>
</html>