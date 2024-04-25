<?php
session_start();
if (!(isset($_SESSION['id']) && $_SESSION['user'] == 'admin')) {
    header("location:index.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Add Student</title>
    <?php
        if (isset($_GET['success'])) {
            if($_GET['success'] == true) {
                echo "<script>alert('Added successfully')</script>";
            }
            else if($_GET['success'] == false) {
                echo "<script>alert('Failed to add')</script>";
            }
        }
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>

<body class="bg-success-subtle">
    <?php
        include('../main_nav.php');
        include('./admin_navbar.php');
    ?>

    <h1 class="text-center"><u>Add Student</u></h1><br>
    <div>

        <form class="row g-3 ms-5 me-5 mt-3 mb-5 border border-4 border-black fw-semibold" action="./add_this_student.php" method="post">
            <div class="col-md-6">
                <label for="S_Name" class="form-label">Student Name</label>
                <input type="text" class="form-control" id="S_Name" name="s_name" required>
            </div>
            <div class="col-md-6">
                <label for="G_Name" class="form-label">Guardian Name</label>
                <input type="text" class="form-control" id="G_Name" name="g_name" required>
            </div>
            <div class="col-md-4">
                <label for="Gmail" class="form-label">Gmail</label>
                <input type="email" class="form-control" id="Gmail" placeholder="Enter Gmail" name="gmail" required>
            </div>
            <div class="col-md-4">
                <label for="Mobile" class="form-label">Mobile number</label>
                <input type="tel" class="form-control" id="Mobile" name="mobile" required>
            </div>
            <div class="col-md-4">
                <label for="G_Mobile" class="form-label">Guardian Mobile number</label>
                <input type="tel" class="form-control" id="G_Mobile" name="g_mobile" required>
            </div>
            <div class="col-md-4">
                <label for="DOB" class="form-label">DOB</label>
                <input type="date" class="form-control" id="DOB" name="dob" required>
            </div>
            <div class="col-md-4">
                <label for="Gender" class="form-label">Gender</label>
                <select id="Gender" class="form-select" name="gender">
                    <option value='' selected>Choose...</option>
                    <option value="M">Male</option>
                    <option value="F">Female</option>
                    <option value="O">Other</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="Blood_Group" class="form-label">Blood Group</label>
                <select id="Blood_Group" class="form-select" name="blood_group">
                    <option value='' selected>Choose...</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
            </div>
            <div class="col-12">
                <label for="Address" class="form-label">Address</label>
                <input type="text" class="form-control" id="Address" placeholder="Enter address" name="address" required>
            </div>
            <div class="col-md-6">
                <label for="Branch" class="form-label">Branch</label>
                <select id="Branch" class="form-select" name="branch">
                    <option value='' selected>Branch..</option>
                    <?php
                        include('../conn.php');
                        
                        $sql_branch = "SELECT * FROM branches order by branch_name asc;";
                        $result = $conn->query($sql_branch);
                        if(!$result)
                        {
                            die("Invalid query: " . $conn->error);
                        }
                        while ($row_branch = $result->fetch_assoc()) {
                            echo "<option value=".$row_branch['id'].">".$row_branch['branch_name']."</option> ";
                        }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="Session" class="form-label">Session</label>
                <select id="Session" class="form-select" name="session">
                    <option value='' selected>Session..</option>
                    <?php
                        include('../conn.php');
                        
                        $sql_session = "SELECT * FROM clg_session order by session_name desc;";
                        $result = $conn->query($sql_session);
                        if(!$result)
                        {
                            die("Invalid query: " . $conn->error);
                        }
                        
                        $years = ['(1st Year)', '(2nd Year)', '(3rd Year)'];
                        $year = 0;
                        while ($row_session = $result->fetch_assoc()) {
                            $show_year = ( $year < 3 ? $years[$year++] : '');
                            echo " <option value='".$row_session['id']."'>".$row_session['session_name']." $show_year</option>";
                        }
                        
                        // $row = $result->fetch_assoc();
                        // echo "<option value=".$row['id'].">".$row['session_name']." (1st Year)</option>";
                        // $row = $result->fetch_assoc();
                        // echo "<option value=".$row['id'].">".$row['session_name']." (2nd Year)</option> ";
                        // $row = $result->fetch_assoc();
                        // echo "<option value=".$row['id'].">".$row['session_name']." (3rd Year)</option> ";
                        // while ($row = $result->fetch_assoc()) {
                        // 	echo "<option value=".$row['id'].">".$row['session_name']."</option> ";
                        // }
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label for="Rollno" class="form-label">Roll number</label>
                <input type="text" class="form-control" id="Rollno" name="rollno" required>
            </div>
            <div class="col-md-6">
                <label for="Password" class="form-label">Password</label>
                <input type="password" class="form-control" id="Password" name="password" required>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary d-grid gap-2 col-6 mx-auto mb-3 mt-3">Add Student</button>
            </div>
        </form>
    </div>
</body>

</html>