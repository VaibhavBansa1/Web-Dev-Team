<?php
session_start();
if (!(isset($_SESSION['id']) && $_SESSION['user'] == 'admin')) {
    header("location:index.php");
}
include '../conn.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../Logo.png" type="image/x-icon">
    <title>Faculty Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <?php
    include '../main_nav.php';
    include './admin_navbar.php';
    ?>
    <div class="container">
        <form action="faculty_detail.php" method="get">
            <span>
                Search by:
            </span>

            <select name="branch_id" id="search-by-branch">
                <option value='' selected>Branch..</option>
                <?php
                $sql_branch = "SELECT * FROM branches order by branch_name asc;";
                $result = $conn->query($sql_branch);
                $selected = '';
                if (!$result) {
                    die("Invalid query: " . $conn->error);
                }
                while ($row_branch = $result->fetch_assoc()) {
                    if (isset($_GET['branch_id'])) {
                        $selected = ($row_branch['id'] === $_GET['branch_id']) ? 'selected' : '';
                    }
                    echo "<option value='" . $row_branch['id'] . "' " . $selected . ">" . $row_branch['branch_name'] . "</option> ";
                }
                $conn->close();
                ?>
            </select>

            <button type="submit" class="btn btn-dark">Search</button>
            <a href="./faculty_detail.php">
                <button type="button" class="btn btn-dark">Show all faculty</button>
            </a>
        </form>
    </div>

    <table class="table table-light table-striped-columns table table-hover">
        <thead class="table-success">
            <tr>
                <th>
                    Faculty ID.
                </th>
                <th>
                    Name
                </th>
                <th>
                    Phone No.
                </th>
                <th>
                    Alternate Phone No.
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
                    More
                </th>
            </tr>
        </thead>
        <tbody>
            <form action='faculty_profile.php' method='get'>
                <?php
                $raw_sql = "SELECT fac.id,
                    faculty_name,
                    gmail,
                    phone_no,
                    alt_phone_no,
                    gender,
                    blood_grp,
                    branch_name from faculty fac
                    inner join branches bra on  bra.id = fac.branch_id 
                    inner join gender g on g.id = fac.gender_id";

                if (isset($_GET['branch_id'])) {
                    $get_branch = $_GET['branch_id'];
                    if ($get_branch === '') {
                        $sql = $raw_sql . ";";
                        show_table($sql);
                    } else {
                        $sql = $raw_sql . " where branch_id = $get_branch;";
                        show_table($sql);
                    }
                } else if (isset($_GET['delete_success'])) {
                    if ($_GET['delete_success'] == true) {
                        echo "<script>alert('Deleted successfully')</script>";
                    }
                    $sql = $raw_sql . ";";
                    show_table($sql);
                } else {
                    $sql = $raw_sql . ";";
                    show_table($sql);
                }
                function show_table($sql)
                {
                    include '../conn.php';
                    $result = $conn->query($sql);
                    // if(!$result) {
                    //     die("Invalid query: " . $conn->error);
                    // }
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                        <td>
                            " . $row['id'] . "
                        </td>
                        <td>
                            " . $row['faculty_name'] . "
                        </td>
                        <td>
                            " . $row['phone_no'] . "
                        </td>
                        <td>
                            " . $row['alt_phone_no'] . "
                        </td>
                        <td>
                            " . $row['gender'] . "
                        </td>
                        <td>
                            " . $row['blood_grp'] . "
                        </td>
                        <td>
                            " . $row['branch_name'] . "
                        </td>
                        <td>
                            <div>
                                <button type='submit' class='btn btn-success p-1 m-1' name='id' value=" . $row['id'] . "> Edit... </button>
                                <button type='submit' class='btn btn-danger p-1 m-1' name='delete' value=" . $row['id'] . "> Delete </button>
                            </div>
                        </td>
                        </tr>";
                    }
                }
                ?>
            </form>
        </tbody>
    </table>
</body>

</html>