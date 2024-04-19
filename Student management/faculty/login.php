<?php
    if(isset($_POST['id']) && isset($_POST['password']) && isset($_POST['submit'])){
        $id = $_POST['id'];
        $pass = $_POST['password'];
        // connection is in conn.php
        include("../conn.php");
        $sql = "SELECT id, password FROM faculty WHERE password = '$pass' AND id = '$id';";
        $result = $conn->query($sql)->fetch_assoc();
        if (($result['password'] === $pass) && ($result['id'] === $id) ){
            $charset = "QAZWSXEDCRFVTGBYHNUJMIKLOPqwertyuiopasdfghjklmnbvcxz1234567890";
            $session_id = ""; 
            for ($i = 0; $i < 25 ; $i++){
                $rand_int = rand(0,61) ;
                $session_id = $session_id . $charset[$rand_int] ;
            }
            session_start();
            $_SESSION['id'] = $session_id;
            $_SESSION['user'] = 'faculty';
            $_SESSION['user_id'] = $result['id'];
            header("location:students_detail.php");
        }
        else{
            header("location:index.php?fail=".true);
        }

        $conn->close();
    }
    else {
        header("Location:index.php");
    }
