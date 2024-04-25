<?php session_start();
if (!(isset($_SESSION['id']) && $_SESSION['user'] == 'faculty')) {
    header("location:index.php");
} else if (
    isset($_POST['s_name']) &&
    isset($_POST['g_name']) &&
    isset($_POST['gmail']) &&
    isset($_POST['mobile']) &&
    isset($_POST['g_mobile']) &&
    isset($_POST['dob']) &&
    isset($_POST['blood_group']) &&
    isset($_POST['address']) &&
    isset($_POST['branch']) &&
    isset($_POST['update'])
) {
    $std_name = $_POST['s_name'];
    $guardian_name = $_POST['g_name'];
    $gmail = $_POST['gmail'];
    $phone_no = $_POST['mobile'];
    $guardian_phone_no = $_POST['g_mobile'];
    $dob = $_POST['dob'];
    $blood_grp = $_POST['blood_group'];
    $address = $_POST['address'];
    $branch_id = $_POST['branch'];
    $id = $_POST['update'];
    include '../conn.php';

    $sql = "UPDATE student set std_name = '$std_name' ,guardian_name = '$guardian_name' ,gmail = '$gmail' ,phone_no = '$phone_no' ,guardian_phone_no = '$guardian_phone_no' ,dob = '$dob' ,blood_grp = '$blood_grp', address = '$address' ,branch_id = $branch_id WHERE id = '$id'";
    if ($conn->query($sql)) {
        header("location:student_profile.php?id=$id&success=" . true);
    } else {
        header("location:student_profile.php?id=$id&success=" . false);
    }
    $conn->close();
} else if ((isset($_POST['s_name']) &&
        isset($_POST['g_name']) &&
        isset($_POST['gmail']) &&
        isset($_POST['mobile']) &&
        isset($_POST['g_mobile']) &&
        isset($_POST['dob']) &&
        isset($_POST['blood_group']) &&
        isset($_POST['address']) &&
        isset($_POST['branch'])) ||
    isset($_GET['delete'])
) {
    echo $delete_this_student = $_GET['delete'];
    include '../conn.php';

    echo $sql = "DELETE FROM student WHERE id = '$delete_this_student';";
    if ($conn->query($sql)) {

        header("location:students_detail.php?delete_success=" . true);
    } else {
        header("location:student_profile.php?id=$id&delete_success=" . false);
    }
} else {
    header("location:index.php");
}
