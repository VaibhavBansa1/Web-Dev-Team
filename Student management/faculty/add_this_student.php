<?php
    include('conn.php');
    echo '<br>' . $id = $_POST['rollno'];
    echo '<br>' . $std_name = $_POST['s_name'];
    echo '<br>' . $guardian_name = $_POST['g_name'];
    echo '<br>' . $gmail = $_POST['gmail'];
    echo '<br>' . $phone_no = $_POST['mobile'];
    echo '<br>' . $guardian_phone_no = $_POST['g_mobile'];
    echo '<br>' . $dob = $_POST['dob'];
    echo '<br>' . $gender_id = $_POST['gender'];
    echo '<br>' . $password = $_POST['password'];
    echo '<br>' . $blood_grp = $_POST['blood_group'];
    echo '<br>' . $address = $_POST['address'];
    echo '<br>' . $branch_id = $_POST['branch'];
    echo '<br>' . $session_id = $_POST['session'];
    
    echo '<br>' . $sql = "INSERT INTO student( id, std_name, guardian_name, gmail, phone_no, guardian_phone_no, dob, gender_id, password, blood_grp, address, branch_id, session_id) 
        values ('$id', '$std_name', '$guardian_name', '$gmail', '$phone_no', '$guardian_phone_no', '$dob', '$gender_id', '$password', '$blood_grp', '$address', $branch_id, $session_id);";
    $conn->query($sql);
    $conn->close();
?>