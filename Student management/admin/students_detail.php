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
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .search_box{
            border-style: solid;
            border-radius: 0.5vw;
            height: 2.5vw;
        }
        @media screen and (max-width: 600px) {
            .search_box{
                margin-bottom: 2vw;
                height: auto;
            }
            .short{
                margin-bottom: 2vw;
            }
        } 
    </style>
</head>

<body>
    <?php
    include '../main_nav.php';
    include './admin_navbar.php';
    ?>
    <div class="text-center text-white pt-1 pb-1"  style="background-color: #e04747;">
        <h1>Student Details</h1>
    </div>
    <div class=" pt-2 pb-2">
        <form action="students_detail.php" method="get" class="row">
            <div class="col-md-4 text-center">
                <b>Search:</b>
                <input type="text" id="myInput" onkeyup="filterTable()" placeholder="Search..." class="search_box border border-dark">
            </div>
            <div class="col-md-5 short">

                <span3>
                    <b>Filter by:</b> 
                </span3>
                <select name="session_id" id="search-by-session" class="btn btn-outline-dark">
                    <option value='' selected>Session and Year..</option>
                    <?php
                    $sql_session = "SELECT * FROM clg_session order by session_name desc;";
                    $result = $conn->query($sql_session);
                    if (!$result) {
                        die("Invalid query: " . $conn->error);
                    }
                    $years = ['(1st Year)', '(2nd Year)', '(3rd Year)'];
                    $year = 0;
                    $selected = '';
                    while ($row_session = $result->fetch_assoc()) {
                        if (isset($_GET['session_id'])) {
                            $selected = ($row_session['id'] === $_GET['session_id']) ? 'selected' : '';
                        }
                        $show_year = ($year < 3 ? $years[$year++] : '');
                        echo " <option value='" . $row_session['id'] . "' " . $selected . ">" . $row_session['session_name'] . " $show_year</option>";
                    }
                    ?>
                </select>
    
                <select name="branch_id" id="search-by-branch" class="btn btn-outline-dark">
                    <option value='' selected>Branch..</option>
                    <?php
                    $sql_branch = "SELECT * FROM branches order by branch_name asc;";
                    $result = $conn->query($sql_branch);
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
            </div>
            <div class="col-md-3 text-center">

                <button type="submit" class="btn btn-outline-danger">Filter</button>
                <a href="./students_detail.php">
                   <button type="button" class="btn btn-outline-danger">Show all student</button>
               </a>
            </div>

        </form>
    </div>
    <!-- <input type="text" id="myInput" onkeyup="filterTable()" placeholder="Search By Roll no." class="search_box "> -->
    <table class="table table-light table-striped-columns table table-hover" id="myTable">
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
                <th>
                    More
                </th>
            </tr>
        </thead>
        <tbody>
            <form action='student_profile.php' method='get'>
                <?php
                $raw_sql = "SELECT std.id,
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
                    inner join users on users.id = std.user_id";

                if (isset($_GET['session_id']) || isset($_GET['branch_id'])) {
                    $get_session = $_GET['session_id'];
                    $get_branch = $_GET['branch_id'];
                    if ($get_session === '' && $get_branch === '') {
                        $sql = $raw_sql . ";";
                        show_table($sql);
                    } else if ($get_session === '' && !($get_branch === '')) {
                        $sql = $raw_sql . " where branch_id = $get_branch;";
                        show_table($sql);
                    } else if (!($get_session === '') && $get_branch === '') {
                        $sql = $raw_sql . " where session_id = $get_session;";
                        show_table($sql);
                    } else if (!($get_session === '') && !($get_branch === '')) {
                        $sql = $raw_sql . " where session_id = $get_session and branch_id = $get_branch;";
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
                            " . $row['std_name'] . "
                        </td>
                        <td>
                            " . $row['guardian_name'] . "
                        </td>
                        <td>
                            " . $row['phone_no'] . "
                        </td>
                        <td>
                            " . $row['guardian_phone_no'] . "
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
                            " . $row['session_name'] . "
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
    <?php
        include '../footer.php';
    ?>
    <script>
        function filterTable(){
            var input, filter, table, tr, td, i, j, txtValue;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
            table = document.getElementById("myTable");
            tr = table.getElementsByTagName("tr");

            // Loop through all table rows, and hide those who don't match the search query
            for (i = 0; i < tr.length; i++) {
                for(j=0;j<8;j++){
                    td = tr[i].getElementsByTagName("td")[j];
                    if (td) {
                        txtValue = td.textContent || td.innerText;
                        if (txtValue.toUpperCase().indexOf(filter) > -1) {
                            tr[i].style.display = "";
                            break;
                        } else {
                            tr[i].style.display = "none";
                        }
                    }
                } 
            }    
        }

    </script>
</body>

</html>