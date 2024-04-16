<?php
require 'db.php';
session_start(); // Start a new session


// Grab form data
function authenticateUser($username, $password) {

    $conn = getDBConnection();

    $stmt = $conn->prepare("SELECT userName, passCode FROM player,authenticator WHERE player.registrationOrder = authenticator.registrationOrder AND userName = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['passCode'])) {
            $_SESSION['userid'] = $row['userName'];
            echo " Login successful!";
            header("refresh:5;url=../main.php");

            return $row['userName'];
        
        } else {
            echo " Invalid username or password";
            return false;
        }
    } else {
        echo " Invalid username or password";
        return false;
    }

    $stmt->close();
    $conn->close();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['UserName'];
    $password = $_POST['password'];

    $loggedInUser = authenticateUser($username, $password);
    if ($loggedInUser !== false) {
        header("Location: homepage.php?username=" . urlencode($loggedInUser));
        exit(); 
    } else {
        $errorMessage = "Invalid username or password";
    }
}
?>
