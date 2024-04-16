<?php
require 'db.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve and sanitize form data
    $username = ($_POST['UserName']);
    $firstname = ($_POST['firstname']);
    $lastname = ($_POST['lastname']);
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];
    
    
    // Basic validation (add more comprehensive validation based on your needs)
    if (!empty($username) && !empty($firstname) && !empty($lastname) && !empty($password) && !empty($confirmpassword)) {
        // Hash the password for security
        $hashedPassword = strval(password_hash($password, PASSWORD_DEFAULT));
        
        // Prepare SQL statement to prevent SQL injection
        $conn = getDBConnection();
//        $sql = "INSERT INTO users (UserName, Password, FirstName, LastName) VALUES ($username, $hashedPassword, $firstname, $lastname)";
//        $result = $conn->query($sql);
//        echo $result;
        $date=date("Y-m-d H:i:s");
          $stmt = $conn->prepare("INSERT INTO player (fName, lName, userName,registrationTime) VALUES (?,?,?,?)");
          $stmt->bind_param("ssss", $firstname,$lastname, $username,$date);
        
        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "<p>Record inserted in player</p>";
            $stmt = $conn->prepare("SELECT registrationOrder FROM player WHERE userName = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0){
                $row = $result->fetch_assoc();
                $registrationOrder = $row['registrationOrder'];
                $stmt = $conn->prepare("INSERT INTO authenticator(passCode, registrationOrder) VALUES (?,?)");
                $stmt->bind_param("si", $hashedPassword,$registrationOrder);
                if($stmt->execute()){
                    echo "<p>You have successfully signed up!</p>";
                    echo"Redirecting to the game";
                    header("refresh:5;url=../main.php");
                }
                
            }
        } else {
            echo "<p>Error: " . $stmt->error . "</p>";
        }
        
        // Close statement and connection
        $stmt->close();
        $conn->close();
    } else {
        echo "<p>Please fill all fields correctly.</p>";
    }
}
?>