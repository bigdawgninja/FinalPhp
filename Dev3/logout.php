<?php
session_start();

// Check if the logout button has been clicked

    // Remove all session variables
    session_unset();
    
    // Destroy the session
    session_destroy();
    
    // Redirect to the login page or home page
    echo"Redirecting to the game";
    header("refresh:5;url=../main.php");
    exit();

?>
