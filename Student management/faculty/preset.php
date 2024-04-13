<?php
    session_start();
    if (!(isset($_SESSION['id']) && $_SESSION['user'] == 'faculty')) {
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
    <?php include('../main_nav.php'); ?>
    <h1>
        Presets
    </h1>
    <fieldset>
        <legend>
            <h2>
                Branch 
            </h2>
        </legend>

        <select id="Branch" class="form-select" name="branch">
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
        
    </fieldset>
    <fieldset>
        <legend>
            <h2>
                Session 
            </h2>
        </legend>
        <select id="Session" class="form-select" name="session">
			<option value='' selected>Session..</option>
			<?php
				include('../conn.php');
				
				$sql_session = "SELECT * FROM clg_session order by session_name desc;";
				$result = $conn->query($sql_session);
				if(!$result)
				{
					die("Invalid query: " . $conn->error);
				}
				$row = $result->fetch_assoc();
				echo "<option value=".$row['id'].">".$row['session_name']." (1st Year)</option>";
				$row = $result->fetch_assoc();
				echo "<option value=".$row['id'].">".$row['session_name']." (2nd Year)</option> ";
				$row = $result->fetch_assoc();
				echo "<option value=".$row['id'].">".$row['session_name']." (3rd Year)</option> ";
				while ($row = $result->fetch_assoc()) {
					echo "<option value=".$row['id'].">".$row['session_name']."</option> ";
				}
			?>
		</select>
        
    </fieldset>
</body>
</html>