<?php
$host = "localhost";
$user = "root";
$password = "";

$conn = new mysqli($host, $user, $password)
    or die('Could not connect to the database server' . mysqli_connect_error());
