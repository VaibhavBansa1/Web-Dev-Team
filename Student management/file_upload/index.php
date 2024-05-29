<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input[type="text"],
        .form-group input[type="number"],
        .form-group input[type="file"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .form-group input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        .form-group input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Upload File</h2>
        <form action="upload.php" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject" required>
            </div>
            <div class="form-group">
                <label for="year">Year:</label>
                <input type="number" id="year" name="year" required>
            </div>
            <div class="form-group">
                <label for="session">Session:</label>
                <input type="text" id="session" name="session" required>
            </div>
            <div class="form-group">
                <label for="file">Choose file:</label>
                <input type="file" id="file" name="file" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Upload">
            </div>
        </form>
    </div>
</body>
</html>