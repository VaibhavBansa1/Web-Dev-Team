<?php session_start();
if (!(isset($_SESSION['id']) && $_SESSION['user'] == 'faculty')) {
	header("location:index.php");
}
if (isset($_GET['s_name']) &&
isset($_GET['g_name']) &&
isset($_GET['gmail']) &&
isset($_GET['mobile']) &&
isset($_GET['g_mobile']) &&
isset($_GET['dob']) &&
isset($_GET['blood_group']) &&
isset($_GET['address']) &&
isset($_GET['branch']) &&
isset($_GET['update']) ) {
	$std_name = $_GET['s_name'];
	$guardian_name = $_GET['g_name'];
	$gmail = $_GET['gmail'];
	$phone_no = $_GET['mobile'];
	$guardian_phone_no = $_GET['g_mobile'];
	$dob = $_GET['dob'];
	$blood_grp = $_GET['blood_group'];
	$address = $_GET['address'];
	$branch_id = $_GET['branch'];
	$id = $_GET['update'];
	include('../conn.php');
       
	$sql = "UPDATE student set std_name = '$std_name' ,guardian_name = '$guardian_name' ,gmail = '$gmail' ,phone_no = '$phone_no' ,guardian_phone_no = '$guardian_phone_no' ,dob = '$dob' ,blood_grp = '$blood_grp', address = '$address' ,branch_id = $branch_id WHERE id = '$id'";
	if ( $conn->query($sql) ) {
		echo "gdfhdfjdgjdghjdfj";
        header("location:student_profile.php?id=$id&success=".true);
   	}
   	else {
       	header("location:student_profile.php?id=$id&success=".false);
   	}
    $conn->close();
}
else if ( (isset($_GET['s_name']) &&
		isset($_GET['g_name']) &&
		isset($_GET['gmail']) &&
		isset($_GET['mobile']) &&
		isset($_GET['g_mobile']) &&
		isset($_GET['dob']) &&
		isset($_GET['blood_group']) &&
		isset($_GET['address']) &&
		isset($_GET['branch']) ) ||
		isset($_GET['delete'])) {
	echo $delete_this_student = $_GET['delete'];
	include('../conn.php');

	echo $sql = "DELETE FROM student WHERE id = '$delete_this_student';";
	if ( $varasas = $conn->query($sql) ) {
		
		header("location:students_detail.php?delete_success=".true);
	}
	else {
		header("location:student_profile.php?id=$id&delete_success=".false);
	}
}
else {
	header("location:index.php");
}
