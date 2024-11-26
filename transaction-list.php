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

                <form id="transaction-form" action="" method="post">          
                    <div>
                        <h1>TRANSACTION LIST</h1>
                    </div>

                    <div id="delete-row">
                        <input type="text" class="form-control" name="transaction_ID" id="transaction_ID" value="" placeholder="Transaction ID">
                        <!-- <input type="text" class="form-control text-center woocommerce-Input woocommerce-Input--text input-text" name="password" id="password" value="" placeholder="Password"> -->
                        <button id="delete" type="submit" class="woocommerce-Button btn btn-maincolor" name="toggle_status">Toggle Status</button>
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
                                while ($row = mysqli_fetch_assoc($result)) { // ginagawa nyang associative array each row
                                    echo "<tr>";
                                    echo "<td>" . $counter++ . "</td>"; 
                                    echo "<td>" . $row['Transaction_ID'] . "</td>";  
                                    echo "<td>" . $row['Client_ID'] . "</td>"; 
                                    echo "<td>" . $row['Transaction_date'] . "</td>";  
                                    echo "<td>" . $row['Total_amount'] . "</td>";  
                                    echo "<td>" . $row['Payment_method'] . "</td>"; 
                                    echo "<td>" . $row['Payment_status'] . "</td>";  
                                    echo "</tr>";
                                }
                            ?>
                            
                        </tbody>
                    </table>
                </div>             
            </div>
        </div>   
        
        <script>
        
        document.getElementById('transaction-form').onsubmit = function(event) {
            var transaction_ID = document.getElementById('transaction_ID').value;
            if (transaction_ID === '') {
                alert('Transaction ID cannot be empty!');
                event.preventDefault();  
                return false; 
            }
        };
         </script>

    </body>
</html>



<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $transaction_ID = filter_var($_POST['transaction_ID'], FILTER_SANITIZE_SPECIAL_CHARS);

        $stmt = $conn->prepare(" SELECT Payment_status FROM transaction WHERE Transaction_ID = ?" );
        $stmt -> bind_param("s",$transaction_ID);

        if ($stmt->execute()) {

            $stmt->bind_result($payment_status);

            if($stmt->fetch()){

                $stmt->free_result();

                if($payment_status === "Paid"){
                    $stmt_update = $conn->prepare("UPDATE transaction SET Payment_status = 'Not Paid' WHERE Transaction_ID = ?");
                } 
                else if ($payment_status === "Not Paid") {
                    $stmt_update = $conn->prepare("UPDATE transaction SET Payment_status = 'Paid' WHERE Transaction_ID = ?");
                }

                $stmt_update->bind_param("s", $transaction_ID);

                if ($stmt_update->execute()) {
                    //echo "<script>alert('Payment status updated successfully!');</script>";
                    echo "<script>window.location.href='transaction-list.php';</script>";
                } else {
                    echo "Error updating status: " . $stmt_update->error;
                }
            } else {
                echo "<script>alert('Transaction ID not found!');</script>";
            }
        } 
    } 
?>




