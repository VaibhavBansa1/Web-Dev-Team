<?php
$host = "localhost";
$user = "admin";
$password = "mysql";
$dbname = "college";

$conn = new mysqli($host, $user, $password, $dbname)
    or die('Could not connect to the database server' . mysqli_connect_error());
