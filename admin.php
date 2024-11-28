<?php
    session_start();
    if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
        header('Location: admin-login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin </title>
        <link rel="stylesheet" href="css/admin1.css" class="color-switcher-link">
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

            <div id="contact-form">

                <div id="aaa">          
                    <h1>Hello, Admin!</h1>

                    <a class="aa" href="account-list.php" >ACCOUNT LIST</a>
                    <a class="aa" href="item-list.php" >ITEM LIST</a>
                    <a class="aa" href="transaction-list.php" >TRANSACTION LIST</a>

                    <form action="admin.php" method="post">
                        <button class="aa" type="submit" name="logout">LOG OUT</button>
                    </form>

                </div>               
            </div>
        </div>      
    </body>
</html>

<?php
    if (isset($_POST['logout'])) {
        session_unset(); // Clear all session variables
        session_destroy(); // Destroy the session
        header("Location: admin-login.php"); 
        exit();
    }

?>



