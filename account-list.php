<?php
    include ("connect.php"); 
?>

<?php
    session_start();
    if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
        header('Location: admin-login.php');
        exit();
    }

    $total_accounts = 0;

    // PANG COUNT NG TOTAL 
    $query = "SELECT COUNT(Client_ID) AS total_clients FROM client;"; //need alias
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Error fetching data: " . mysqli_error($conn));
    }

    if ($row = mysqli_fetch_assoc($result)) {
        $total_accounts = $row['total_clients']; 
    }

    //search ------------------------------
    $search_query = "SELECT Client_ID, Username, Password, Age, Gender, Contact_Number, Email_Address, 
                        CONCAT(Fname, ' ', Mname, ' ', Lname) AS Full_Name
                    FROM client";

    // Search Logic (Client ID or Client Name)
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
        $client_ID = filter_var($_POST['client_ID'], FILTER_SANITIZE_SPECIAL_CHARS); 
        $client_Name = filter_var($_POST['client_Name'], FILTER_SANITIZE_SPECIAL_CHARS);
        $username = filter_var($_POST['username'], FILTER_SANITIZE_SPECIAL_CHARS);


        // Search Client ID
        if (!empty($client_ID)) {
            $search_query .= " WHERE Client_ID LIKE '%$client_ID%'";
        }

        // Search Client Name
        if (!empty($client_Name)) {
            if (strpos($search_query, 'WHERE') !== false) { // If WHERE already exists
                $search_query .= " AND CONCAT(Fname, ' ', Mname, ' ', Lname) LIKE '%$client_Name%'";
            } else {
                $search_query .= " WHERE CONCAT(Fname, ' ', Mname, ' ', Lname) LIKE '%$client_Name%'";
            }
        }

        // Search Username
        if (!empty($username)) {
            if (strpos($search_query, 'WHERE') !== false) { // If WHERE already exists
                $search_query .= " WHERE Username LIKE '%$username%'";
            } else {
                $search_query .= " WHERE Username LIKE '%$username%'";
            }
        }
    }

    $result = mysqli_query($conn, $search_query);
    
    if (!$result) {
        die("Error fetching data: " . mysqli_error($conn));
    }


   
?>


<script>
            // JavaScript function to monitor the text fields
            function toggleDeleteButton() {
                var clientID = document.getElementById('client_ID').value.trim();
                var clientName = document.getElementById('client_Name').value.trim();
                var username = document.getElementById('username').value.trim();

                // If client_ID is filled and no other fields are filled, enable Delete button
                if (clientID !== "" && clientName === "" && username === "") {
                    document.getElementById('delete').disabled = false;
                } else {
                    document.getElementById('delete').disabled = true;
                }
            }

            // Attach event listeners for input fields
            window.onload = function() {
                document.getElementById('client_ID').addEventListener('input', toggleDeleteButton);
                document.getElementById('client_Name').addEventListener('input', toggleDeleteButton);
                document.getElementById('username').addEventListener('input', toggleDeleteButton);
            };
        </script>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account List </title>
        <link rel="stylesheet" href="css/accounts-lists.css" class="color-switcher-link">
        <!-- <link rel="stylesheet" href="css/main.css" class="color-switcher-link"> -->
    </head>

    
    <body>
        <div id="nav">
            <div id="nav-elements">
                <img src="images/logo.png">
                <div>
                    <h4 class="logo-text color-main">Cherubim Of Heaven</h4>
                    <span class="logo-subtext">Funeral Service</span>
                </div>
            </div>

            <div id="back-button"> <a href="admin.php">Main Menu</a> </div>
        </div>

        <div id="down">

            <div id="base">

                <form action="" method="post">          
                <div id="title">
                        <h1>ACCOUNTS LIST</h1>
                    </div>

                    <div id="report-blocks">
                        <div class="block"> 
                            <p>ACCOUNTS: </p>
                            <p><?php  echo  $total_accounts ;?></p>
                        </div> 
                    </div>

                    <div id="delete-row">
                        <p>Enter Client ID and click delete to remove:</p>
                        <div>
                            <input type="text" class="boxDesign" name="client_ID" id="client_ID" value="" placeholder="Client ID">
                             <input class="boxDesign" type="text" class="form-control" name="client_Name" id="transaction_ID" value="" placeholder="Client Name">
                             <input class="boxDesign" type="text" class="form-control" name="username" id="transaction_ID" value="" placeholder="Username">
                            <button id="toggle" type="submit" class="woocommerce-Button btn btn-maincolor" name="search">Search</button>
                        </div>
                    </div>
                                 
                </form>

                <div id="table">
                    <table>
                        <thead>

                            <tr>
                                <th>#</th>
                                <th>Client ID</th>
                                <th>Username</th>
                                <!-- <th>Password</th> -->
                                <th>Client Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Contact Number</th>
                                <th>Email Address</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php
                              

                                $counter = 1; 
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $counter++ . "</td>"; 
                                    echo "<td>" . $row['Client_ID'] . "</td>"; 
                                    echo "<td>" . $row['Username'] . "</td>";
                                    // echo "<td>" . $row['Password'] . "</td>"; 
                                    echo "<td>" . $row['Full_Name'] . "</td>"; 
                                    echo "<td>" . $row['Age'] . "</td>"; 
                                    echo "<td>" . $row['Gender'] . "</td>";
                                    echo "<td>" . $row['Contact_Number'] . "</td>"; 
                                    echo "<td>" . $row['Email_Address'] . "</td>"; 
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>             
            </div>
        </div>     
    </body>
</html>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if( isset($_POST['toggle_status']) ){

            $client_ID = filter_var($_POST['client_ID'], FILTER_SANITIZE_SPECIAL_CHARS);

            $stmt = $conn->prepare("DELETE FROM client WHERE Client_ID = ?" );
            $stmt -> bind_param("s",$client_ID);

            if ($stmt->execute()) {
                echo "<script>window.location.href='account-list.php';</script>";
            } else {
                $message = "Error: " . $stmt->error;
                $message_type = "error";
            }

        }
        
    }
?>




