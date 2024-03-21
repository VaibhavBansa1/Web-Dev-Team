<?php
    if(isset($_POST['id']) && isset($_POST['password']) && isset($_POST['submit'])){
        $id = $_POST['id'] ;
        $password = $_POST['password'];
        $host="localhost";
        $port=3306;
        $socket="";
        $user="root";
        $pass="Bansal@police1";
        $dbname="college";
        
        $con = new mysqli($host, $user, $pass, $dbname, $port, $socket)
        or die ('Could not connect to the database server' . mysqli_connect_error());
        
        $sql = "SELECT id, password FROM student WHERE password = '$password' AND id = '$id';";
        $result = $con->query($sql)->fetch_assoc();
        echo $result['password'], $password;
        if (($result['password'] == $password) && ($result['id'] == $id) ){
            header("location:studentdetail.php");
        }
        else{
            header("location:index.php?fail=".true);
        }

        $con->close();
    }
    else{
        header("Location:index.php");
    }

?>