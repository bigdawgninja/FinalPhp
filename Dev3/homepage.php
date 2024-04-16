<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header('Location: login.html');
    exit;
}
if(isset($_POST['mainMenu'])) {
    header("Location: ..\main.php");
    exit;
}

if(isset($_POST["logout_btn"])) {
    if(isset($_POST["logout_btn"])) {
        header("Location: logout.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 300px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .submit-btn {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .submit-btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <div class="container">
    <h2>Login successful</h2>
    <form method="post">
        <button type="submit" name="logout_btn">Sign Out</button>
        <button type="submit" name="mainMenu">Game</button>
    </form>
    </div>
</body>
</html>
