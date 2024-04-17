<?php
    include("..\Dev5\comm_element.html");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        .container {
            max-width: 300px;
            margin: auto;
            padding: 10%;
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
    <h2>Sign Up</h2>
    <form action="signup.php" method="POST">
        <div class="form-group">
            <label for="UserName">UserName:</label>
            <input type="text" id="UserName" name="UserName" required>
        </div>
        <div class="form-group">
            <label for="firstname">FirstName:</label>
            <input type="text" id="firstname" name="firstname" required>
        </div>
        <div class="form-group">
            <label for="lastname">LastName:</label>
            <input type="text" id="lastname" name="lastname" required>
        </div>
        
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="confirmpassword">Confirm Password:</label>
            <input type="password" id="confirmpassword" name="confirmpassword" required>
        </div>
        <button type="submit" class="submit-btn">Sign Up</button>
    </form>
</div>

</body>
</html>

<?php
echo"<br/>";
include("..\Dev5\comm_footer.html");

?>

