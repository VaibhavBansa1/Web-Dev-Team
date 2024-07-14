<?php
$host = "localhost";
$user = "admin";
$password = "mysql";

$conn = new mysqli($host, $user, $password)
    or die('Could not connect to the database server' . mysqli_connect_error());
