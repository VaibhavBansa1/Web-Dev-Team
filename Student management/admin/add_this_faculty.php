<?php
session_start();
if (!(isset($_SESSION['id']) && $_SESSION['user'] == 'admin')) {
    header("location:index.php");
}
if (
    isset($_POST['faculty_id']) &&
    isset($_POST['faculty_name']) &&
    isset($_POST['gmail']) &&
    isset($_POST['mobile']) &&
    isset($_POST['alt_mobile']) &&
    isset($_POST['dob']) &&
    isset($_POST['gender']) &&
    isset($_POST['password']) &&
    isset($_POST['blood_group']) &&
    isset($_POST['address']) &&
    isset($_POST['branch'])
) {

    include '../conn.php';
    $id = $_POST['faculty_id'];
    $faculty_name = $_POST['faculty_name'];
    $gmail = $_POST['gmail'];
    $phone_no = $_POST['mobile'];
    $alt_phone_no = $_POST['alt_mobile'];
    $dob = $_POST['dob'];
    $gender_id = $_POST['gender'];
    $pass = $_POST['password'];
    $blood_grp = $_POST['blood_group'];
    $address = $_POST['address'];
    $branch_id = $_POST['branch'];

    $sql = "INSERT INTO faculty( id,faculty_name, password, gmail, phone_no,
         alt_phone_no, dob, gender_id, blood_grp, address, branch_id) 
        values ('$id','$faculty_name','$pass','$gmail','$phone_no','$alt_phone_no',
         '$dob', '$gender_id','$blood_grp','$address',$branch_id);";
    $result = $conn->query($sql);
    $conn->error;
    if ($result) {
        header("location:adding_new_faculty.php?success=" . true);
    } else {
        header("location:adding_new_faculty.php?success=" . false);
    }
    $conn->close();
} else {
    header("location:adding_new_faculty.php");
}
