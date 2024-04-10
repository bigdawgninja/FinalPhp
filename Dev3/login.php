<?php
require 'db.php';
session_start(); // Start a new session


// Grab form data
$username = $_POST['UserName'];
$password = $_POST['password'];
$conn = getDBConnection();

$stmt = $conn->prepare("SELECT userName, passCode FROM player,authenticator WHERE player.registrationOrder = authenticator.registrationOrder AND userName = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['passCode'])) {
        $_SESSION['userid'] = $row['userName'];
        echo " Login successful!".$username;
        header("Location: /FinalPhp/FinalPhp/main.php");
        exit();

    } else {
        echo " Invalid username or password";
    }
} else {
    echo " Invalid username or password";
}

$stmt->close();
$conn->close();
?>
