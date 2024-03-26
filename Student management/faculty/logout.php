<?php
    if(isset($_POST['btn'])){
        session_start();
        session_unset();
        session_destroy();
        header("location:index.php");
    }
    else {
        header("location:index.php");
    }
?>