<?php
$host = "localhost";
$port = 3306;
$user = "root";
$password = "mysql";
$dbname = "college";

$conn = new mysqli($host, $user, $password, $dbname, $port)
    or die('Could not connect to the database server' . mysqli_connect_error());
