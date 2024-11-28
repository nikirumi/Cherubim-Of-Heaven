<?php
    include ("connect.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Transaction List </title>
        <link rel="stylesheet" href="css/lists.css" class="color-switcher-link">
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

            <div id="back-button"> <a href="admin.php" >Main Menu</a> </div>
        </div>

        <div id="down">

            <div id="base">

                <form id="transaction-form" action="" method="post">          
                    <div>
                        <h1>TRANSACTION LIST</h1>
                    </div>

                    <div id="delete-row">

                    

                        <p>Enter ID and toggle status:</p>
                        <div>

                        <input class="boxDesign" type="text" class="form-control" name="transaction_ID" id="transaction_ID" value="" placeholder="Transaction ID">

                        <select  class="boxDesign"  name="payment_status" id="payment_status">
                            <option class="boxDesign" value="" disabled selected>Select Payment Status</option>
                            <option class="boxDesign" value="Paid">Paid</option>
                            <option class="boxDesign" value="Not Paid">Not Paid</option>
        
                        </select>

                        <select  class="boxDesign"  name="service_status" id="service_status">
                            <option class="boxDesign" value="" disabled selected>Select Progress Status</option>
                            <option class="boxDesign" value="On Going">On Going</option>
                            <option class="boxDesign" value="Completed">Completed</option>
                        </select>

                            
                            <button id="toggle" type="submit" class="woocommerce-Button btn btn-maincolor" name="toggle_status">Toggle Status</button>
                        </div>

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
                                <th>Status</th>
                            </tr>

                        </thead>

                        <tbody>

                            <?php
                                include ("connect.php");

                                // nireretrieve records from the CLIENT table
                                

                                $query = " SELECT 
                                                t.Transaction_ID, 
                                                t.Client_ID, 
                                                t.Transaction_date, 
                                                t.Total_amount, 
                                                t.Payment_method, 
                                                t.Payment_status, 
                                                sp.Service_ID, 
                                                sp.Service_status 
                                            FROM 
                                                transaction t 
                                            LEFT JOIN 
                                                service_progress sp ON t.Transaction_ID = sp.Transaction_ID";

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
                                    echo "<td>" . $row['Service_status'] . "</td>";
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

        $stmt = $conn->prepare("SELECT * FROM transaction WHERE Transaction_ID = ? LIMIT 1");
        $stmt->bind_param("s", $transaction_ID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0){

            if(!empty($_POST['payment_status'])){
                $payment_status = filter_var($_POST['payment_status'], FILTER_SANITIZE_SPECIAL_CHARS);
                $stmt = $conn->prepare("UPDATE transaction SET Payment_status = ? where Transaction_ID = ?" );
                $stmt->bind_param("ss", $payment_status, $transaction_ID);
    
                if ($stmt->execute()) {
                    echo "<script>alert('Status Updated!');</script>";
                    echo "<script>window.location.href='transaction-list.php';</script>";
                }
                else {
                    echo "<script>alert('Error: " . $stmt->error . "');</script>";
                }
            }
            
            if(!empty($_POST['service_status'])){
                $service_status = filter_var($_POST['service_status'], FILTER_SANITIZE_SPECIAL_CHARS);
                $stmt = $conn->prepare("UPDATE service_progress SET Service_status = ? where Transaction_ID = ?" );
                $stmt->bind_param("ss", $service_status, $transaction_ID);
    
                if ($stmt->execute()) {
                    echo "<script>alert('Status Updated!');</script>";
                    echo "<script>window.location.href='transaction-list.php';</script>";
                }
                else {
                    echo "<script>alert('Error: " . $stmt->error . "');</script>";
                }
            } 
        }
        else {
            echo "<script>alert('ID does not exist');</script>";
            echo "<script>window.location.href='transaction-list.php';</script>";
            exit(); //es
        }
    } 
?>




