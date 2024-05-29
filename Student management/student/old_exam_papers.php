<?php
session_start();
if (!(isset($_SESSION['id']) && isset($_SESSION['user_id']))) {
    header("location:index.php");
}
include '../admin_conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old Exam Papers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="//cdn.datatables.net/2.0.5/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</head>

<body>
    <?php
    include '../main_nav.php';
    include 'student_navbar.php';
    ?>

    <div class="text-center text-white pt-1 pb-1" style="background-color: #e04747;">
        <h1>RGPV Diploma Previous Year Question Papers</h1>
    </div>
    <br>
    <br>
    <table class="table table-light table-striped-columns table table-hover text-center" id="pyq_table">
        <thead class="table-success">
            <tr>
                <th>S.no.</th>
                <th>Subject Name</th>
                <th>Year</th>
                <th>Subject Code</th>
                <th>Uploaded On</th>
                <th>Link</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $sql = "SELECT * FROM `files`";
            $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()){
                
                $id = $row['id'];
                $subject = $row['subject'];
                $year = $row['year'];
                $sub_code = $row['sub_code'];
                $uploaded_on = $row['uploaded_on'];
                $date = date_create($uploaded_on);
                $uploaded_on = date_format($date,"d/m/y");
                $file = $row['file'];

           echo "<tr>
                    <td>$id</td>
                    <td>$subject</td>
                    <td>$year</td>
                    <td>$sub_code</td>
                    <td>$uploaded_on</td>
                    <td>
                        <a href='../PYQ/$file' target='_blank'>Click here</a>
                    </td>
                </tr>";
            }
            
            ?>
            <!-- <tr>
                <td>2</td>
                <td>MATHEMATICS - I</td>
                <td>2023</td>
                <td>F</td>
                <td><a href="https://drive.google.com/file/d/1cKJGyl_ghCmm_GX51pr7yjYH-C6FXj8l/view?usp=drive_link">Click
                        here</a></td>
            </tr>
            <tr>
                <td>3</td>
                <td>APPLIED PHYSICS - I</td>
                <td>2023</td>
                <td>F</td>
                <td><a href="https://drive.google.com/file/d/1mn3mZXJ2WsssjHnNYgRLWsU83-ZbaMHb/view?usp=drive_link">Click
                        here</a></td>
            </tr>
            <tr>
                <td>4</td>
                <td>APPLIED CHEMISTRY</td>
                <td>2022</td>
                <td>F</td>
                <td><a href="https://drive.google.com/file/d/1Vb9033OURhhy7i7LMeJzXowTQwU9Tubi/view?usp=share_link">Click
                        here</a></td>
            </tr>
            <tr>
                <td>5</td>
                <td>APPLIED CHEMISTRY</td>
                <td>2023</td>
                <td>F</td>
                <td><a href="https://drive.google.com/file/d/17CqG_oHmNxuLj8bDh5XwI6FXxpSI1LlA/view?usp=drive_link">Click
                        here</a></td>
            </tr>
            <tr>
                <td>6</td>
                <td>COMMUNICATION SKILL IN ENGLISH</td>
                <td>2022</td>
                <td>F</td>
                <td><a href="https://drive.google.com/file/d/1aqscWyWL1aeQkGpjinYpnS_EqUQwY0Su/view?usp=share_link">Click
                        here</a></td>
            </tr>
            <tr>
                <td>7</td>
                <td>COMMUNICATION SKILL IN ENGLISH</td>
                <td>2023</td>
                <td>F</td>
                <td><a href="https://drive.google.com/file/d/1AoGva3zOWC6sKQBR7i5Gt6pP0uruyGYe/view?usp=drive_link">Click
                        here</a></td>
            </tr> -->
        </tbody>
    </table>
    </div>
    <br>
    <br>
    <?php
    include '../footer.php';
    ?>
    <script>
        let table = new DataTable('#pyq_table');
        let search = document.getElementById("dt-search-0");
        search.placeholder = "Search Papers";

    </script>
</body>

</html>