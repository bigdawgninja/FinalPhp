<?php
    include("..\Dev5\comm_element.html");

// Handle form submission here. You might want to lookup the user by email,
// generate a unique token, save it with an expiration time, and send it via email.

?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
</head>
<body>

<h2>Forgot Password</h2>
<form action="update_password.php" method="post">
    UserName: <input type="text" name="UserName" required>
    New Password: <input type="password" name="password" required>
    <button type="submit">Submit</button>
</form>

</body>
</html>

<?php
echo"<br/>";
include("..\Dev5\comm_footer.html");
?>
