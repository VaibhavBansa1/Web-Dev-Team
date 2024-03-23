<?php
    if(isset($_POST['id']) && isset($_POST['password']) && isset($_POST['submit'])){
        $id = $_POST['id'] ;
        $password = $_POST['password'];
        // connection is in conn.php
        include("conn.php");
        $sql = "SELECT id, password FROM faculty WHERE password = '$password' AND id = '$id';";
        $result = $conn->query($sql)->fetch_assoc();
        echo $result['password'], $password;
        if (($result['password'] === $password) && ($result['id'] === $id) ){
            header("location:studentdetail.php");
        }
        else{
            header("location:index.php?fail=".true);
        }

        $conn->close();
    }
    else{
        header("Location:index.php");
    }
?>