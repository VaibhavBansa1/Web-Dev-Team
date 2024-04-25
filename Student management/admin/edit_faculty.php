<?php session_start();
if (!(isset($_SESSION['id']) && $_SESSION['user'] == 'admin')) {
    header("location:index.php");
} else if (
    isset($_POST['faculty_name']) && isset($_POST['gmail']) && isset($_POST['mobile']) && isset($_POST['alt_mobile']) && isset($_POST['dob']) &&
    isset($_POST['gender']) && isset($_POST['blood_group']) && isset($_POST['address']) && isset($_POST['branch']) && isset($_POST['password']) &&
    isset($_POST['update'])
) {

    $faculty_name = $_POST['faculty_name'];
    $gmail = $_POST['gmail'];
    $phone_no = $_POST['mobile'];
    $alt_phone_no = $_POST['alt_mobile'];
    $dob = $_POST['dob'];
    $gender_id = $_POST['gender'];
    $blood_grp = $_POST['blood_group'];
    $address = $_POST['address'];
    $branch_id = $_POST['branch'];
    $pass = $_POST['password'];
    $id = $_POST['update'];

    include '../conn.php';

    $sql = "UPDATE faculty set faculty_name = '$faculty_name' ,gmail = '$gmail' ,phone_no = '$phone_no' ,alt_phone_no = '$alt_phone_no' ,dob = '$dob' , gender_id = '$gender_id', blood_grp = '$blood_grp', address = '$address', branch_id = $branch_id, password = '$pass' WHERE id = '$id'";
    if ($conn->query($sql)) {
        header("location:faculty_profile.php?id=$id&success=" . true);
    } else {
        header("location:faculty_profile.php?id=$id&success=" . false);
    }
    $conn->close();
} else if (isset($_GET['delete'])) {
    echo $delete_this_faculty = $_GET['delete'];
    include '../conn.php';

    echo $sql = "DELETE FROM faculty WHERE id = '$delete_this_faculty';";
    if ($conn->query($sql)) {

        header("location:faculty_detail.php?delete_success=" . true);
    } else {
        header("location:faculty_profile.php?id=$id&delete_success=" . false);
    }
} else {
    header("location:index.php");
}
