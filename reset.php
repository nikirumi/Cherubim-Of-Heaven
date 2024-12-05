<?php
session_start();  // Start the session at the very beginning of the script

if (isset($_POST["save_account_details"])) {
    // Enable error reporting
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Database connection
    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "cherubim";
    $connect = new mysqli($server, $username, $password, $db);

    // Check the connection
    if ($connect->connect_error) {
        die("Connection failed: " . $connect->connect_error);
    }

    // Sanitize and get the email input
    $email = mysqli_real_escape_string($connect, $_POST["user_login"]);

    // Query the database for the email
    $sql = mysqli_query($connect, "SELECT * FROM client WHERE Email_Address='$email'");
    $query = mysqli_num_rows($sql);

    // Check if the email exists in the database
    if ($query <= 0) {
        echo "<script>alert('Sorry, no account with this email exists.');</script>";
    } else {
        // Fetch the client's name
        $fetch = mysqli_fetch_assoc($sql);
        $clientName = $fetch['Client_Name'];  // Assuming 'Client_Name' is the column name for the user's name

        // Generate a reset token
        $token = bin2hex(random_bytes(50));

        // Set session variables
        $_SESSION['token'] = $token;
        $_SESSION['email'] = $email;

        // Store the token in the database
        $update_token_query = "UPDATE client SET token='$token' WHERE Email_Address='$email'";
        if (mysqli_query($connect, $update_token_query)) {
            // Send the recovery email
            require "Mail/phpmailer/PHPMailerAutoload.php";
            $mail = new PHPMailer;

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->Port = 465;
            $mail->SMTPAuth = true;
            $mail->SMTPSecure = 'ssl'; // Ensure SSL/TLS is set correctly

            // SMTP account credentials
            $mail->Username = 'cherubim.of.heaven.2024@gmail.com';
            $mail->Password = 'noicohwcwuizfooq';  // Your SMTP password

            // Email setup
            $mail->setFrom('cherubim.of.heaven.2024@gmail.com', 'Cherubim Of Heaven');
            $mail->addAddress($email); // Recipient's email address
            $mail->isHTML(true);
            $mail->Subject = "Recover your password";
            $mail->Body = "
                <html>
                <head>
                    <style>
                        body {
                            font-family: Arial, sans-serif;
                            background-color: #f4f4f4;
                            margin: 0;
                            padding: 0;
                        }
                        .email-container {
                            max-width: 600px;
                            margin: 30px auto;
                            background-color: #fff;
                            padding: 20px;
                            border-radius: 5px;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        }
                        .email-header {
                            background-color: #141e3c;
                            color: #fff;
                            padding: 10px;
                            text-align: center;
                            border-radius: 5px 5px 0 0;
                        }
                        .email-header h2 {
                            margin: 0;
                        }
                        .email-body {
                            padding: 20px;
                            text-align: center;
                        }
                        .button {
                            background-color: #baad7b;
                            color: white;
                            padding: 10px 20px;
                            border-radius: 5px;
                            text-decoration: none;
                            font-size: 16px;
                        }
                        .button:hover {
                            background-color: #9f9c65;
                        }
                    </style>
                </head>
                <body>
                    <div class='email-container'>
                        <div class='email-header'>
                            <h2>Password Reset Request</h2>
                        </div>
                        <div class='email-body'>
                            <p>Dear $clientName,</p>
                            <p>We received a request to reset your password. If you did not make this request, please ignore this email.</p>
                            <p>To reset your password, please click the button below:</p>
                            <a href='http://localhost/Cherubim-Of-Heaven/reset_psw.php?token=$token' class='button'>Reset Password</a>
                        </div>
                    </div>
                </body>
                </html>
            ";

            // Check if the email is sent
            if (!$mail->send()) {
                echo "<script>alert('Failed to send email. Please check the email address and try again.');</script>";
            } else {
                echo "<script>window.location.replace('notification.html');</script>";
            }
        } else {
            echo "<script>alert('Failed to store the token. Please try again later.');</script>";
        }
    }
}
?>

