<?php
    include ("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Transaction List </title>
        <link rel="stylesheet" href="css/item-list.css" class="color-switcher-link">
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
        </div>

        <div id="down">

            <div id="base">

                <form action="" method="post">          
                    <div>
                        <h1>TRANSACTION LIST</h1>
                    </div>

                    <div id="delete-row">
                        <input type="text" class="form-control" name="transaction_ID" id="transaction_ID" value="" placeholder="Transaction ID">
                        <!-- <input type="text" class="form-control text-center woocommerce-Input woocommerce-Input--text input-text" name="password" id="password" value="" placeholder="Password"> -->
                        <button id="delete" type="submit" class="woocommerce-Button btn btn-maincolor" name="login">Delete</button>
                    </div>
                
                    
                </form>

                <div id="table">
                    <table>
                        <thead>

                            <tr>
                                <th>#</th>
                                <th>Transaction ID</th>
                                <th>Client ID</th>
                                <th>Transaction Date</th>
                                <th>Total Amount</th>
                                <th>Payment Method</th>
                                <th>Payment Status</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php
                                include ("connect.php");

                                // nireretrieve records from the CLIENT table
                                $query = "SELECT * FROM transaction"; 
                                $result = mysqli_query($conn, $query);
                                
                                if (!$result) {
                                    die("Error fetching data: " . mysqli_error($conn));
                                }

                                $counter = 1; 
                                while ($row = mysqli_fetch_assoc($result)) {
                                    echo "<tr>";
                                    echo "<td>" . $counter++ . "</td>";  // Row number
                                    echo "<td>" . $row['Transaction_ID'] . "</td>";  // Transaction ID
                                    echo "<td>" . $row['Client_ID'] . "</td>";  // Client ID
                                    echo "<td>" . $row['Transaction_date'] . "</td>";  // Transaction Date
                                    echo "<td>" . $row['Total_amount'] . "</td>";  // Total Amount
                                    echo "<td>" . $row['Payment_method'] . "</td>";  // Payment Method
                                    echo "<td>" . $row['Payment_status'] . "</td>";  // Payment Status
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




