<?php
include "./_conn.php";

$sql = "
    
    DROP DATABASE IF EXISTS admin_info;
    CREATE DATABASE admin_info;
    USE admin_info;
    CREATE TABLE admin (
        id VARCHAR(15) PRIMARY KEY,
        admin_name VARCHAR(50) NOT NULL CHECK (LENGTH(admin_name) > 0),
        password VARCHAR(20) NOT NULL CHECK (LENGTH(password) >= 8),
        gmail VARCHAR(50) NOT NULL UNIQUE CHECK (LENGTH(gmail) > 10) ,
        phone_no VARCHAR(10) NOT NULL UNIQUE,
        alt_phone_no VARCHAR(10) NOT NULL UNIQUE,
        gender VARCHAR(6) NOT NULL CHECK (gender IN ('Male', 'Female', 'Other')),
        blood_grp VARCHAR(3),
        address VARCHAR(256) NOT NULL,
        dob DATE NOT NULL,
        user_type CHAR(9) NOT NULL CHECK (user_type IN ('sup_admin', 'admin'))
    );

    INSERT INTO admin
    VALUES
        ('admin1', 'Vaibhav', 'password', 'vaibhav@gmail.com', '9109863175', '8109863175', 'Male', 'B+', 'Mall road, Opposite Police Station, Morar, Gwalior', '2000-01-01', 'sup_admin'),
        ('admin2', 'Sivam', 'password', 'sivam@gmail.com', '9109863132', '9109863182', 'Male', 'A-', 'Mall road, Opposite Police Station, Morar, Gwalior', '2001-02-03', 'sup_admin'),
        ('admin3', 'Keshav', 'password', 'keshav3@gmail.com', '8109864578', '9109863155', 'Male', 'B-', 'Mall road, Opposite Police Station, Morar, Gwalior', '2001-05-12', 'sup_admin');
        Drop Database If Exists file_db;
        
    CREATE TABLE files (
        id INT(11) AUTO_INCREMENT PRIMARY KEY,
        subject VARCHAR(255) NOT NULL,
        year INT(11) NOT NULL,
        sub_code VARCHAR(255) NOT NULL,
        file VARCHAR(255) NOT NULL unique,
        uploaded_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );
";

if ($conn->multi_query($sql)) {
    do {
        if ($result = $conn->store_result()) {
            $result->free();
        }
    } while ($conn->more_results() && $conn->next_result());
} else {
    echo "Error executing queries: " . $conn->error;
}

$conn->close();

        
// CREATE DATABASE file_db;
// USE file_db;

// create table subject(
//     sub_id int auto_increment primary key,
//     sub_name varchar(200) unique not null
// );

// insert into subject(sub_name) values('MATHAMATICS - I'),('MATHAMATICS - II'),('APPLIED PHYSICS - I'),('APPLIED PHYSICS - II'),('APPLIED CHEMISTRY'),
// ('COMUNICATION SKILL IN ENGLISH'),('ENGINEERING MECHANICS'),('F.E.E.E.');

// CREATE TABLE files (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     name VARCHAR(255) NOT NULL,
//     type VARCHAR(50) NOT NULL,
//     size INT NOT NULL,
//     content LONGBLOB NOT NULL
// );



?>
