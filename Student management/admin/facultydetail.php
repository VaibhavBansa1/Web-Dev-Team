<?php
    session_start();
    if(!(isset($_SESSION['id']) && $_SESSION['user'] == 'admin')){
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
        include('../main_nav.php');
    ?>

        <h3>
            search by:
        </h3>
    <table class="table table-light table-striped-columns table table-hover">
        <thead class="table-success">
            <tr>
                <th>
                    Roll No.
                </th>
                <th>
                    Name
                </th>
                <th>
                    Guardian Name
                </th>
                <th>
                    Gmail
                </th>
                <th>
                    Phone No.
                </th>
                <th>
                    Guardian Phone No.
                </th>
                <th>
                    Gender
                </th>
                <th>
                    Blood Group
                </th>
                <th>
                    Branch
                </th>
                <th>
                    Session
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            include('../conn.php');
            $sql = "SELECT std.id,
                std_name,
                guardian_name,
                gmail,
                phone_no,
                guardian_phone_no,
                gender,
                blood_grp,
                branch_name,
                session_name from student std
            inner join branches bra on  bra.id = std.branch_id 
            inner join clg_session cls on cls.id = std.session_id
            inner join gender g on g.id = std.gender_id
            inner join users on users.id = std.user_id;
           ";
            $result = $conn->query($sql);
            if(!$result)
            {
                die("Invalid query: " .  $conn->error);
            }
            
            while($row = $result->fetch_assoc()) {
                
                echo "<tr>
                    <td>
                        ".$row['id']."
                    </td>
                    <td>
                        ".$row['std_name']."
                    </td>
                    <td>
                        ".$row['guardian_name']."
                    </td>
                    <td>
                        ".$row['gmail']."
                    </td>
                    <td>
                        ".$row['phone_no']."
                    </td>
                    <td>
                        ".$row['guardian_phone_no']."
                    </td>
                    <td>
                        ".$row['gender']."
                    </td>
                    <td>
                        ".$row['blood_grp']."
                    </td>
                    <td>
                        ".$row['branch_name']."
                    </td>
                    <td>
                        ".$row['session_name']."
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>