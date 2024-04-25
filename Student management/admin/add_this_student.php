<?php
session_start();
if (!(isset($_SESSION['id']) && $_SESSION['user'] == 'admin')) {
    header("location:index.php");
}
if (
    isset($_POST['rollno']) &&
    isset($_POST['s_name']) &&
    isset($_POST['g_name']) &&
    isset($_POST['gmail']) &&
    isset($_POST['mobile']) &&
    isset($_POST['g_mobile']) &&
    isset($_POST['dob']) &&
    isset($_POST['gender']) &&
    isset($_POST['password']) &&
    isset($_POST['blood_group']) &&
    isset($_POST['address']) &&
    isset($_POST['branch']) &&
    isset($_POST['session'])
) {

    include '../conn.php';
    $id = $_POST['rollno'];
    $std_name = $_POST['s_name'];
    $guardian_name = $_POST['g_name'];
    $gmail = $_POST['gmail'];
    $phone_no = $_POST['mobile'];
    $guardian_phone_no = $_POST['g_mobile'];
    $dob = $_POST['dob'];
    $gender_id = $_POST['gender'];
    $pass = $_POST['password'];
    $blood_grp = $_POST['blood_group'];
    $address = $_POST['address'];
    $branch_id = $_POST['branch'];
    $session_id = $_POST['session'];

    $sql = "INSERT INTO student( id, std_name, guardian_name, gmail, phone_no, guardian_phone_no, dob, gender_id, password, blood_grp, address, branch_id, session_id) 
        values ('$id', '$std_name', '$guardian_name', '$gmail', '$phone_no', '$guardian_phone_no', '$dob', '$gender_id', '$pass', '$blood_grp', '$address', $branch_id, $session_id);";
    $result = $conn->query($sql);
    $conn->error;
    if ($result) {
        header("location:adding_new_student.php?success=" . true);
    } else {
        header("location:adding_new_student.php?success=" . false);
    }
    $conn->close();
} else {
    header("location:adding_new_student.php");
}
