<?php
    include ("connect.php"); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Account List </title>
        <link rel="stylesheet" href="css/lists.css" class="color-switcher-link">
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
                    <div>
                        <h1>ACCOUNT LIST</h1>
                    </div>

                    <div id="delete-row">
                        <p>Enter Client ID and click delete to remove:</p>
                        <div>
                            <input type="text" class="boxDesign" name="client_ID" id="client_ID" value="" placeholder="Client ID">
                            <button id="delete" type="submit" class="woocommerce-Button btn btn-maincolor" name="login">Delete</button>
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
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Contact Number</th>
                                <th>Email Address</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php
                                // nireretrieve records from the CLIENT table
                                $query = "SELECT * FROM client"; 
                                $result = mysqli_query($conn, $query);
                                
                                if (!$result) {
                                    die("Error fetching data: " . mysqli_error($conn));
                                }

                                $counter = 1; 
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $counter++ . "</td>"; 
                                    echo "<td>" . $row['Client_ID'] . "</td>"; 
                                    echo "<td>" . $row['Username'] . "</td>";
                                    // echo "<td>" . $row['Password'] . "</td>"; 
                                    echo "<td>" . $row['Fname'] . "</td>"; 
                                    echo "<td>" . $row['Mname'] . "</td>";
                                    echo "<td>" . $row['Lname'] . "</td>"; 
                                    echo "<td>" . $row['Age'] . "</td>"; 
                                    echo "<td>" . $row['Gender'] . "</td>";
                                    echo "<td>" . $row['Contact_Number'] . "</td>"; 
                                    echo "<td>" . $row['Email_Address'] . "</td>"; 
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
    $query = "SELECT * FROM client"; 
    $result = $conn->query($query);

    if (!$result) {
        die("Error fetching data: " . mysqli_error($conn));
    }

?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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
?>




