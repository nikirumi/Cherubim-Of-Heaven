<?php

    include("check_session.php");

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
        $currentPassword = $_POST['password_current'];
        $newPassword = $_POST['password_1'];
        $confirmPassword = $_POST['password_2'];

        if ($newPassword === $confirmPassword) {

            $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

            $updateQuery = "UPDATE CLIENT SET Password=? WHERE Username=?";
            
            if ($stmt = $conn->prepare($updateQuery)) {
                $stmt->bind_param("ss", $hashedPassword, $username);
                
                if ($stmt->execute()) {
                    echo "Password updated successfully!";
                    header("Location: shop-account-details.php");
                } 
                else {
                    echo "Error updating password. Please try again.";
                }
                $stmt->close();
            } 
            
            else {
                echo "Error preparing the query.";
            }
        } 
        
        else {
            echo "Passwords do not match. Please try again.";
        }
    } 
    
    else {
        echo "Please submit the form to update your password.";
    }

?>