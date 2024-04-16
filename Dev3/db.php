<?php
function getDBConnection() {
    $servername = "localhost";
    $username = "root";           // Default user for XAMPP MySQL
    $password = "";               // Default is no password for XAMPP
    $dbname = "kidsGames"; // Your database name

// Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
    if (!$conn) {
        die("Connection failed: ".mysqli_connect_error());
    }
//echo "Connected successfully";
    if ($conn) {
        //echo "connected success";
        
    }
    return $conn;
    
}
?>
