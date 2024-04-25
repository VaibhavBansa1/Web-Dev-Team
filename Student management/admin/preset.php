<?php
    session_start();
    if (!(isset($_SESSION['id']) && $_SESSION['user'] == 'admin')) {
        header("location:index.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Presets</title>
</head>
<body>
    <?php 
        include '../main_nav.php'; 
        include './admin_navbar.php'; 
    ?>
    <h1>
        Presets
    </h1>
    <div class="container">
        <h2 class="form-control" >
            Branch 
        </h2>
        
        <ul id="Branch">
                    <?php
                        include '../conn.php';
                        
                        $sql_branch = "SELECT * FROM branches order by branch_name asc;";
                        $result = $conn->query($sql_branch);
                        if(!$result)
                        {
                            die("Invalid query: " . $conn->error);
                        }
                        while ($row_branch = $result->fetch_assoc()) {
                            echo "<li value=".$row_branch['id'].">".$row_branch['branch_name']."</li> ";
                        }
                    ?>
        </ul>
        
        <h2>
            Session 
        </h2>
        <ul id="Session">
            <?php
                include '../conn.php';
                
                $sql_session = "SELECT * FROM clg_session order by session_name desc;";
                $result = $conn->query($sql_session);
                if(!$result)
                {
                    die("Invalid query: " . $conn->error);
                }
                while ($row = $result->fetch_assoc()) {
                    echo "<li value=".$row['id'].">".$row['session_name']."</li> ";
                }
            ?>
        </ul>
    </div>
</body>
</html>