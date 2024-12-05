<?php
session_start(); // Start session

// Check if the form is submitted
if (isset($_POST["save_account_details"])) {
    // Check if token is being passed via POST
    if (isset($_POST['token'])) {
        echo "<script>alert('Token received: " . $_POST['token'] . "');</script>";  // Debugging line to check the token received
    } else {
        echo "<script>alert('No token received.');</script>";  // If token is not received
    }

    // Database connection
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "cherubim";
    $connect = new mysqli($server, $username, $password, $db);

    // Check if the connection is established
    if (!$connect) {
        die("<script>alert('Connection failed: " . mysqli_connect_error() . "');</script>");
    }

    // Retrieve form data
    $new_password = $_POST["new_password"];
    $confirm_password = $_POST["confirm_password"];
    $token = $_POST['token']; // Token passed from the form
    $email = $_SESSION['email']; // Assuming email is stored in session

    // Check if passwords match
    if ($new_password !== $confirm_password) {
        echo "<script>alert('Passwords do not match.');</script>";
    } else {
        // Hash the new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Validate if the email and token match in the database
        if ($token) {
            $sql = "SELECT * FROM client WHERE Email_Address = '$email' AND token = '$token'";
            $result = mysqli_query($connect, $sql);

            // Check if the query executed successfully
            if (!$result) {
                die("<script>alert('Query failed: " . mysqli_error($connect) . "');</script>");
            }

            if (mysqli_num_rows($result) > 0) {
                // Update the password in the database and clear the token
                $update_sql = "UPDATE client SET Password = '$hashed_password', token = NULL WHERE Email_Address = '$email'";
                if (mysqli_query($connect, $update_sql)) {
                    // Password updated successfully, unset session and redirect
                    session_unset();  // Clear session variables
                    session_destroy(); // Destroy session

                    // Redirect with a success message
                    echo "<script>
                            alert('Your password has been successfully reset!');
                            window.location.replace('shop-account-login.php');  // Redirect to login page
                          </script>";
                } else {
                    // Error updating the password
                    echo "<script>alert('Error updating password, please try again later.');</script>";
                }
            } else {
                // Token or email mismatch
                echo "<script>alert('Invalid or expired token.');</script>";
            }
        } else {
            echo "<script>alert('Token is missing.');</script>";
        }
    }
}
?>

