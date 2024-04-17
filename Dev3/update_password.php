<?php
include 'db.php';

    $username = $_POST['UserName'];
    $newPassword = $_POST['password']; // The new password entered by the user
    $conn = getDBConnection();
    
    // Fetch the current password hash from the database
    $stmt = $conn->prepare("SELECT userName, registrationOrder FROM player WHERE userName = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $excisting_username = $row['userName'];
        $excisting_user_reg_order = $row['registrationOrder'];
        
        // Verify the current password
        if (!empty($excisting_username)) {
            $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
            $updateStmt = $conn->prepare("UPDATE authenticator SET passCode = ? WHERE registrationOrder = ?");
            $updateStmt->bind_param("si", $newPasswordHash, $excisting_user_reg_order);
            
            if ($updateStmt->execute()) {
                echo "Password updated successfully! You will be redirected in 5 seconds";
                header("refresh:5;url=../main.php");
            } else {
                echo "Error updating password.";
            }
        } else {
            echo "Current UserName is incorrect.";
        }
    } else {
        echo "User not found.";
    }
    
    $stmt->close();
    $conn->close();
    
?>
