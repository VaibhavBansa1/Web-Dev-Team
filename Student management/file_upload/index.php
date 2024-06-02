<?php
    session_start();
    if(!(isset($_SESSION['id']) && isset($_SESSION['user_id']) && in_array($_SESSION['user'],['admin','faculty']))){
        header("location:../");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<link rel="shortcut icon" href="../Logo.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload PYQ</title>
</head>

<body>
    <?php
    include '../main_nav.php';
    if($_SESSION['user'] == "admin") {
        include "../admin/admin_navbar.php";
    } else if ($_SESSION['user'] == "faculty") {
        include "../faculty/faculty_navbar.php";
    }
    ?>
    <div class="text-center text-white pt-1 pb-1"  style="background-color: #e04747;">
        <h1>Upload PVQ</h1>
    </div>
    <br><br>
    <div class="container p-6">
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="subject" class="form-label">SubjSct:</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="year" class="form-label">Year:</label>
                <input type="number" class="form-control" id="year" name="year" required>
            </div>
            <div class="form-group">
                <label for="sub_code" class="form-label">Subject code:</label>
                <input type="text" class="form-control" id="sub_code" name="sub_code" required>
            </div>
            <div class="form-group">
                <label for="file" class="form-label">Choose file:</label>
                <input type="file" class="form-control" id="file" name="file" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-outline-danger d-grid gap-2 col-6 mx-auto mb-3 mt-3" value="Upload">
            </div>
        </form>
    </div>

    <br><br>
    <?php include '../footer.php'; ?>
</body>

</html>