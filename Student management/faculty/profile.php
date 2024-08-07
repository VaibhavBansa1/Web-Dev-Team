<?php
    session_start();
    if(!(isset($_SESSION['id']) && isset($_SESSION['user_id']) && $_SESSION['user'] == 'faculty')){
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../Logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
</head>
<body>
    <?php
        include '../main_nav.php';
        include 'faculty_navbar.php';
    ?>

    <?php 
            
        $get_id = $_SESSION['user_id'];
        include '../conn.php' ;
        $sql = "SELECT fac.id,
        faculty_name,
        gmail,
        phone_no,
        alt_phone_no,
        dob,
        gender,
        password,
        blood_grp,
        address,
        branch_name
        from faculty fac
            inner join branches bra on  bra.id = fac.branch_id 
            inner join gender g on g.id = fac.gender_id where fac.id = '$get_id';";

        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        if (isset($_GET['success'])) {
            if($_GET['success'] == true) {
                echo "<script>
                    alert('Edited successfully');
                    location.href = './profile.php';
                </script>";
            }
            else if($_GET['success'] == false) {
                echo "<script>
                    alert('Failed to Edit');
                    location.href = './profile.php';
                </script>";
            }
        }
    ?>

        <form class="row g-3 ms-5 me-5 mt-3 mb-5 border border-4 border-black fw-semibold bg-danger-subtle" action="edit_profile.php" method="post" style="border-radius: 2rem;">
             <h1 class="text-center"><u>Faculty personal profile</u></h1>
             <hr>
            <div class="col-md-6">
                <label for="S_Name" class="form-label">Name</label>
                <p class="form-control" id="S_Name" name="s_name"  ><?php echo $row['faculty_name']; ?></p>
            </div>
            <!-- <div class="col-md-6">
                <label for="G_Name" class="form-label">Guardian Name</label> -->
                <!-- <input type="text" class="form-control" id="G_Name" name="g_name" value="<?php // echo $row['guardian_name']; ?>" required> -->
                <!-- <p class="form-control" id="S_Name" name="s_name"  ><?php // echo $row['guardian_name']; ?></p>
            </div> -->
            <div class="col-md-6">
                <label for="Gmail" class="form-label">Gmail</label>
                <input type="email" class="form-control" id="Gmail" placeholder="Enter Gmail" name="gmail" value="<?php echo $row['gmail']; ?>" required>

            </div>
            <div class="col-md-4">
                <label for="Mobile" class="form-label">Mobile number</label>
                <input type="tel" class="form-control" id="Mobile" name="mobile" value="<?php echo $row['phone_no']; ?>" required>
            </div>
            <div class="col-md-4">
                <label for="alt_phone_no" class="form-label">Alternate Mobile number</label>
                <input type="tel" class="form-control" id="alt_phone_no" name="alt_phone_no" value="<?php echo $row['alt_phone_no']; ?>" required>

            </div>
            <div class="col-md-4">
                <label for="DOB" class="form-label">DOB</label>
                <p class="form-control" id="S_Name" name="s_name"  ><?php echo $row['dob']; ?></p>

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
                        $row_blood = [ 'A+' , 'A-' , 'B+' , 'B-' , 'AB+' , 'AB-' , 'O+' , 'O-' ];
                        foreach ($row_blood as $key) {
                            $selected = ($key === $row['blood_grp']) ? 'selected' : '';
                            echo "<option value='".$key."'".$selected.">".$key."</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="col-md-4">
                <label for="Branch" class="form-label">Branch</label>
                <h2 id="Branch" class="form-control" name="branch">
                    <?php echo $row['branch_name']; ?>
                </h2>
            </div>


            <div class="col-12">
                <label for="Address" class="form-label">Address</label>
                <input type="text" class="form-control" id="Address" name="address" value="<?php echo $row['address']; ?>"required>
            </div>
            
            <!-- <div class="col-md-6">
                <label for="Session" class="form-label">Session</label>
                <h2 id="Session" class="form-control" name="session">
                    <?php // echo $row['session_name']; ?>
                </h2>
            </div> -->
            <div class="col-md-6">
                <label for="faculty-id" class="form-label">Faculty Username</label>
                <h2 class="form-control" id="faculty-id" >
                    <?php echo $row['id']; ?>
                </h2>
            </div>
            <div class="col-md-6">
                <label for="Password" class="form-label">Password</label>
                <div class="d-flex">
                    <input type="password" class="form-control" id="Password" name="password" value="<?php echo $row['password']; ?>"required>
                    <button type="button" class="btn btn-outline-info ms-2" onclick="showpassword()">🔏</button>
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary d-grid gap-2 col-6 mx-auto mb-3 mt-3" name="update" value="<?php echo $row['id']; ?>">Edit Details</button>
            </div>
        </form>
        <?php
        include '../footer.php';
        ?>
        <script>
            function showpassword(){
                x = document.getElementById("Password"); 
                if(x.type=="password"){
                    x.type="text";
                }
                else{
                    x.type="password";
                }
            }
        </script>
</body>
</html>