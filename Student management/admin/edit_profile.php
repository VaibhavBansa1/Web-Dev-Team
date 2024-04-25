<?php session_start();
if (!(isset($_SESSION['id']) && $_SESSION['user'] == 'student')) {
    header("location:index.php");
}
if (
    isset($_POST['gmail']) &&
    isset($_POST['mobile']) &&
    isset($_POST['alt_phone_no']) &&
    isset($_POST['blood_group']) &&
    isset($_POST['address']) &&
    isset($_POST['password']) &&
    isset($_POST['update']) &&
    $_POST['update'] == $_SESSION['user_id']
) {
    $gmail = $_POST['gmail'];
    $phone_no = $_POST['mobile'];
    $alt_phone_no = $_POST['alt_phone_no'];
    $blood_grp = $_POST['blood_group'];
    $address = $_POST['address'];
    $pass = $_POST['password'];
    $id = $_POST['update'];
    include '../admin_conn.php';

    $sql = "UPDATE admin set gmail = '$gmail', phone_no = '$phone_no', alt_phone_no = '$alt_phone_no', blood_grp = '$blood_grp', address = '$address', password = '$pass' WHERE id = '$id'";
    if ($conn->query($sql)) {
        header("location:profile.php?&success=" . true);
    } else {
        header("location:profile.php?&success=" . false);
    }
    $conn->close();
} else {
    header("location:profile.php?&success=fsdfs" . false);
}
