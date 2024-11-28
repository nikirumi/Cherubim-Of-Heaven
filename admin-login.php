<?php 
	include ("connect.php"); 
    session_start();
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin-Login</title>
        <link rel="stylesheet" href="css/admin1.css" class="color-switcher-link">
        <!-- <link rel="stylesheet" href="css/main.css" class="color-switcher-link"> -->
    </head>
    <body>

        <div id="left">
                <img src="images/logo.png" alt="">
                <div class="d-flex flex-column">
                    <h4 class="logo-text color-main">Cherubim Of Heaven</h4>
                    <span class="logo-subtext">Funeral Service</span>
                </div>
        </div>
    

        <div id="right">

            <div id="#aaa">

                <form action="admin-login.php" method="post">        

                <h1>Admin Login</h1>

                <div id="textField">
                <input type="text" class="form-control " name="username" id="username" value="" placeholder="Username">
                <input type="password" class="form-control " name="password" id="password" value="" placeholder="Password">
                <button type="submit" class="woocommerce-Button btn btn-maincolor" name="login">Login</button>
                </div>
                </form>
               
            </div>

        </div>
        
    </body>

</html>

<?php
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['login'])) {
            $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);
            $password = filter_var($_POST['password'], FILTER_SANITIZE_SPECIAL_CHARS);
        
            // SQL QUERY
            $stmt = $conn->prepare("SELECT * FROM admin WHERE Username = ? LIMIT 1");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
        
            // check if the user exists
            if ($result->num_rows > 0) {
                $Admin = $result->fetch_assoc();
        
                // password verification 
                if ($password === $Admin['Password']) {
                    $_SESSION['admin_logged_in'] = true;
                    $_SESSION['admin_username'] = $Admin['Username'];
                    echo "<script>alert('Log in Successful');</script>";
                    echo "<script>window.location.href='admin.php';</script>";
                    exit();
                } else {
                    // If password is incorrect
                    echo "<script>alert('Username/Password is Incorrect');</script>";
                    echo "<script>window.location.href='admin-login.php';</script>";
                    exit();
                }
            }
             else {
                // If user does not exist
                echo "<script>alert('Username/Password is Incorrect');</script>";
                echo "<script>window.location.href='admin-login.php';</script>";
                exit();
            }
        }
    }
    $conn->close();
?>




