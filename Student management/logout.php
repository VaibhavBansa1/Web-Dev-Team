<?php
    if(isset($_POST['btn'])){
        session_start();
        session_unset();
        session_destroy();
        header("location:./home");
    }
    else {
        header("location:./home");
    }
?>