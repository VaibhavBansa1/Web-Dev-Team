<?php
    session_start();
    if(!(isset($_SESSION['id']) && $_SESSION['user'] == 'faculty')){
        header("location:index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php
        include('../main_nav.php');
    ?>
    <div class="container">
        <form action="students_detail.php" method="get">
            <span>
                Search by:
            </span>
            <select name="session_id" id="search-by-session">
                <option value='' selected>Session and Year..</option>
                <?php 
                    include('../conn.php');

                    $sql_session = "SELECT * FROM clg_session order by session_name desc;";
                    $result = $conn->query($sql_session);
                    if(!$result)
                    {
                        die("Invalid query: " . $conn->error);
                    }
                    $row_session = $result->fetch_assoc();
                    echo "<option value=".$row_session['id'].">".$row_session['session_name']." (1st Year)</option>";
                    $row_session = $result->fetch_assoc();
                    echo "<option value=".$row_session['id'].">".$row_session['session_name']." (2nd Year)</option> ";
                    $row_session = $result->fetch_assoc();
                    echo "<option value=".$row_session['id'].">".$row_session['session_name']." (3rd Year)</option> ";
                    while ($row_session = $result->fetch_assoc()) {
                        echo "<option value=".$row_session['id'].">".$row_session['session_name']."</option> ";
                    }
                ?>
            </select>
            
            </select>
            <select name="branch_id" id="search-by-session">
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
                
            <button type="submit" class="btn btn-dark">Search</button>
            <a href="./students_detail.php">
                <button type="button" class="btn btn-dark">Show all student</button>
            </a>
        </form>
    </div>
        
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
            <form action='student_profile.php' method='post'>
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

                if(isset($_GET['session_id']) || isset($_GET['branch_id'])) {
                    $get_session = $_GET['session_id'];
                    $get_branch = $_GET['branch_id'];
                    if( $get_session === '' && $get_branch === '' ) {
                        $sql = $raw_sql . ";" ;
                        show_table($sql);
                    }
                    else if ($get_session === '' && !($get_branch === '')) {
                        $sql = $raw_sql . " where branch_id = $get_branch;" ;
                        show_table($sql);
                    }
                    else if(!($get_session === '') && $get_branch === '') {
                        $sql = $raw_sql . " where session_id = $get_session;" ;
                        show_table($sql);
                    }
                    else if ( !($get_session === '') && !($get_branch === '') ) {
                        $sql = $raw_sql . " where session_id = $get_session and branch_id = $get_branch;" ;
                        show_table($sql);
                    }
                }
                else {
                    $sql = $raw_sql . ";" ;
                    show_table($sql);
                }
                function show_table($sql) {
                    include('../conn.php');
                    $result = $conn->query($sql);
                    if(!$result) {
                        die("Invalid query: " . $conn->error);
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
                        <td>
                            <button type='submit' class='btn btn-success' name='id' value=".$row['id'].">Edit...</button>
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