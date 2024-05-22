<?php
    session_start();
    if(!(isset($_SESSION['id']) && isset($_SESSION['user_id']) && $_SESSION['user'] == 'student')){
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Old Exam Papers</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
</head>
<body>
<?php
  include '../main_nav.php';
  include 'student_navbar.php';
  ?>
  <div class="text-center text-white pt-1 pb-1"  style="background-color: #e04747;">
      <h1>RGPV Diploma Previous Year Question Papers</h1>
  </div>
        <table class="table table-light table-striped-columns table table-hover text-center">
            <thead class="table-success">
                <tr>
                    <th>S.no.</th>
                    <th>Subject Name</th>
                    <th>Year</th>
                    <th>Session</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>MATHAMATICS - I</td>
                    <td>2022</td>
                    <td>F</td>
                    <td><a href="https://drive.google.com/file/d/1EWRb1z1o16e7Hg-qOKo0UtcHJt4NrmIK/view">Click here</a></td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>MATHAMATICS - I</td>
                    <td>2023</td>
                    <td>F</td>
                    <td><a href="https://drive.google.com/file/d/1cKJGyl_ghCmm_GX51pr7yjYH-C6FXj8l/view?usp=drive_link">Click here</a></td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>APPLIED PHYSICS - I</td>
                    <td>2023</td>
                    <td>F</td>
                    <td><a href="https://drive.google.com/file/d/1mn3mZXJ2WsssjHnNYgRLWsU83-ZbaMHb/view?usp=drive_link">Click here</a></td>
                </tr>
                <tr>
                    <td>4</td>
                    <td>APPLIED CHEMISTRY</td>
                    <td>2022</td>
                    <td>F</td>
                    <td><a href="https://drive.google.com/file/d/1Vb9033OURhhy7i7LMeJzXowTQwU9Tubi/view?usp=share_link">Click here</a></td>
                </tr>
                <tr>
                    <td>5</td>
                    <td>APPLIED CHEMISTRY</td>
                    <td>2023</td>
                    <td>F</td>
                    <td><a href="https://drive.google.com/file/d/17CqG_oHmNxuLj8bDh5XwI6FXxpSI1LlA/view?usp=drive_link">Click here</a></td>
                </tr>
                <tr>
                    <td>6</td>
                    <td>COMUNICATION SKILL IN ENGLISH</td>
                    <td>2022</td>
                    <td>F</td>
                    <td><a href="https://drive.google.com/file/d/1aqscWyWL1aeQkGpjinYpnS_EqUQwY0Su/view?usp=share_link">Click here</a></td>
                </tr>
                <tr>
                    <td>7</td>
                    <td>COMUNICATION SKILL IN ENGLISH</td>
                    <td>2023</td>
                    <td>F</td>
                    <td><a href="https://drive.google.com/file/d/1AoGva3zOWC6sKQBR7i5Gt6pP0uruyGYe/view?usp=drive_link">Click here</a></td>
                </tr>
            </tbody>
        </table>
  </div>
    <?php
        include '../footer.php';
    ?>
</body>
</html>