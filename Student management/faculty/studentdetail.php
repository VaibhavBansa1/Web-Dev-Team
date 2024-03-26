<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <nav>
        <h3>
            search by:
        </h3>
    </nav>
    <table>
        <thead>
            <tr>
                <th>
                    Roll No.
                </th>
                <th>
                    Name
                </th>
                <th>
                    Phone No. 
                </th>
                <th>
                    Father Name
                </th>
                <th>
                    Blood  Group
                </th>
                <th>
                    Address
                </th>
                <th>
                    Branch
                </th>
                <th>
                    Sem
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    22bracs04
                </td>
                <td>
                    Vaibhav Bansal
                </td>
                <td>
                    97131 45866
                </td>
                <td>
                    Pawan Kumar Bansal
                </td>
                <td>
                    B+
                </td>
                <td>
                    opposite police station
                </td>
                <td>
                    CSE
                </td>
                <td>
                    4th
                </td>
            </tr>
        </tbody>
    </table>
    <?php
        include('logout_btn.php');
    ?>
</body>
</html>