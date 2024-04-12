<?php
    session_start();
    if (!(isset($_SESSION['id']) && $_SESSION['user'] == 'faculty')) {
        header("location:index.php");
    }
    
?>