<?php
session_start();
if (!(isset($_SESSION['id']) && $_SESSION['user'] == 'faculty')) {
    header("location:index.php");
}
include '../conn.php';
if (isset($_GET['id'])) {
    $get_id = $_GET['id'];
    $sql = "SELECT std.id,
    std_name,
    guardian_name,
    gmail,
    phone_no,
    guardian_phone_no,
    dob,
    gender,
    password,
    blood_grp,
    address,
    branch_name,
    session_name
    from student std
        inner join branches bra on  bra.id = std.branch_id 
        inner join clg_session cls on cls.id = std.session_id
        inner join gender g on g.id = std.gender_id where std.id = '$get_id';";

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
} else if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    header("location:edit_student.php?delete=$delete_id");
} else {
    header('location:students_detail.php');
}
if (isset($_GET['success'])) {
    if ($_GET['success'] == true) {
        echo "<script>
            alert('Edited successfully');
        </script>";
    } else if ($_GET['success'] == false) {
        echo "<script>
            alert('Failed to Edit');
        </script>";
    }
}
if (isset($_GET['delete_success'])) {
    if ($_GET['delete_success'] == false) {
        echo "<script>
            alert('Failed to Delete');
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../Logo.png" type="image/x-icon">
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body>

    <?php
    include '../main_nav.php';
    include './faculty_navbar.php';
    ?>

    <div>
        <form class="row g-3 ms-5 me-5 mt-3 mb-5 border border-4 border-black fw-semibold bg-danger-subtle" action="edit_student.php" method="post" style="border-radius: 2rem;">
            <h1 class="text-center"><u>Edit Student</u></h1><br>
            <div class="col-md-6">
                <label for="S_Name" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="S_Name" name="s_name" value="<?php echo $row['std_name']; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="G_Name" class="form-label">Guardian Name</label>
                <input type="text" class="form-control" id="G_Name" name="g_name" value="<?php echo $row['guardian_name']; ?>" required>
            </div>
            <div class="col-md-4">
                <label for="Gmail" class="form-label">Gmail</label>
                <input type="email" class="form-control" id="Gmail" placeholder="Enter Gmail" name="gmail" value="<?php echo $row['gmail']; ?>" required>
            </div>
            <div class="col-md-4">
                <label for="Mobile" class="form-label">Mobile number</label>
                <input type="tel" class="form-control" id="Mobile" name="mobile" value="<?php echo $row['phone_no']; ?>" required>
            </div>
            <div class="col-md-4">
                <label for="G_Mobile" class="form-label">Guardian Mobile number</label>
                <input type="tel" class="form-control" id="G_Mobile" name="g_mobile" value="<?php echo $row['guardian_phone_no']; ?>" required>
            </div>
            <div class="col-md-4">
                <label for="DOB" class="form-label">DOB</label>
                <input type="date" class="form-control" id="DOB" name="dob" value="<?php echo $row['dob']; ?>" required>
            </div>
            <div class="col-md-4">
                <label for="Gender" class="form-label">Gender</label>
                <h2 id="Gender" class="form-control" name="gender">
                    <?php echo $row['gender']; ?>
                </h2>
            </div>
            <div class="col-md-4">
                <label for="Blood_Group" class="form-label">Blood Group</label>
                <select id="Blood_Group" class="form-select" name="blood_group">
                    <?php
                    $row_blood = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];
                    foreach ($row_blood as $key) {
                        $selected = ($key === $row['blood_grp']) ? 'selected' : '';
                        echo "<option value='" . $key . "'" . $selected . ">" . $key . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-12">
                <label for="Address" class="form-label">Address</label>
                <input type="text" class="form-control" id="Address" name="address" value="<?php echo $row['address']; ?>" required>
            </div>
            <div class="col-md-6">
                <label for="Branch" class="form-label">Branch</label>
                <select id="Branch" class="form-select" name="branch">
                    <?php
                    $sql_branch = "SELECT * FROM branches ORDER BY branch_name ASC;";
                    $result = $conn->query($sql_branch);
                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }
                    while ($row_branch = $result->fetch_assoc()) {
                        $selected = ($row_branch['branch_name'] === $row['branch_name']) ? 'selected' : '';
                        echo "<option value='" . $row_branch['id'] . "'" . $selected . ">" . $row_branch['branch_name'] . "</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="Session" class="form-label">Session</label>
                <h2 id="Session" class="form-control" name="session">
                    <?php echo $row['session_name']; ?>
                </h2>
            </div>
            <div class="col-md-6">
                <label for="Rollno" class="form-label">Roll number</label>
                <h2 class="form-control" id="Rollno">
                    <?php echo $row['id']; ?>
                </h2>
            </div>
            <div class="col-md-6">
                <label for="Password" class="form-label">Password</label>
                <h2 class="form-control" id="Password">
                    <?php echo $row['password']; ?>
                </h2>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary d-grid gap-2 col-6 mx-auto mb-3 mt-3" name="update" value="<?php echo $row['id']; ?>">Edit Student</button>
                <button type="submit" class="btn btn-danger d-grid gap-2 col-6 mx-auto mb-3 mt-3" name="delete" formmethod="get" value="<?php echo $row['id']; ?>">Delete Student</button>
            </div>
        </form>
    </div>
    <?php
        include '../footer.php';
    ?>
</body>

</html>