<?php
    include("connect.php");
    include("check_session.php");

    if ($username) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $service_ID = isset($_POST['service_ID']) ? $_POST['service_ID'] : null;
            $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null;

            if (isset($_POST['place_order'])) {
                // Handle the form submission
                $service_ID = isset($_POST['service_ID']) ? $_POST['service_ID'] : null;
                echo "Service ID: " . $service_ID;

                $billing_first_name = isset($_POST['billing_first_name']) ? $_POST['billing_first_name'] : '';
                $billing_last_name = isset($_POST['billing_last_name']) ? $_POST['billing_last_name'] : '';
                $billing_barangay = isset($_POST['billing_barangay']) ? $_POST['billing_barangay'] : '';
                $billing_purok = isset($_POST['billing_purok']) ? $_POST['billing_purok'] : '';
                $billing_hnum = isset($_POST['billing_hnum']) ? $_POST['billing_hnum'] : '';
                $billing_sname = isset($_POST['billing_sname']) ? $_POST['billing_sname'] : '';
                $payment_method = isset($_POST['payment_method']) ? $_POST['payment_method'] : '';
                $retrieval_method = "test";
                $payment_status = "Pending";
                $service_status = "On Going";

                $gen_add =  $billing_hnum . " " . $billing_sname . ", " . $billing_purok . " " . $billing_barangay . ", Hagonoy, Bulacan"; 
                    
                // auto generation ng transaction ID ----------
                $trans_id = '';

                $query = "SELECT Transaction_ID FROM Transaction ORDER BY Transaction_ID DESC LIMIT 1";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();


                if ($row && isset($row['Transaction_ID']) && preg_match('/^TR-(\d+)$/', $row['Transaction_ID'], $matches)) {
                    $lastID = intval($matches[1]);
                    $newID = 'TR-' . str_pad($lastID + 1, 3, '0', STR_PAD_LEFT);
                } 
                
                else {
                    $newID = 'TR-001';
                }

                $trans_id = $newID;
                //----------------end


                $current_datetime = date("Y-m-d H:i:s");
                $start_datetime = date("Y-m-d H:i:s");

                $clientquery = "SELECT Client_ID FROM CLIENT WHERE Username = ?";
                $stmt = $conn->prepare($clientquery);
                $stmt->bind_param("s", $username);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $client_id = $row['Client_ID']; // Fetch Client_ID from the result set
                $stmt->close();

                $price_query = "SELECT Service_Price FROM memorial_services WHERE Service_ID = ?";
                $stmt_price = $conn->prepare($price_query);
                $stmt_price->bind_param("s", $service_ID);
                $stmt_price->execute();
                $result_price = $stmt_price->get_result();
                $row_price = $result_price->fetch_assoc();

                if (!$row_price) {
                    die("Service not found or price unavailable.");
                }

                $service_price = $row_price['Service_Price'];
                $total = $quantity * $service_price;

                echo "Service Price: $service_price, Quantity: $quantity, Total: $total"; // Debugging output

                $add_trans_query = "INSERT INTO transaction (Transaction_ID, Client_ID, Transaction_Date, Total_Amount, Payment_Method, Payment_Status, Retrieval_Method, General_Address) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($add_trans_query);

                if ($stmt === false) {
                    die('MySQL prepare error: ' . $conn->error);
                }

                $stmt->bind_param("sssdssss", $trans_id, $client_id, $current_datetime, $total, $payment_method, $payment_status, $retrieval_method, $gen_add);

                if ($stmt->execute()) {
                    echo "Transaction successfully inserted!";

                    $add_service_query = "INSERT INTO service_progress (Transaction_ID, service_ID, Start_Datetime, Service_status) 
                                        VALUES (?, ?, ?, ?)";
                    $stmt2 = $conn->prepare($add_service_query);

                    if ($stmt2 === false) {
                        die('MySQL prepare error: ' . $conn->error);
                    }

                    $start_datetime = $current_datetime; // Same as transaction date
                    $service_status = "On Going";
                    $stmt2->bind_param("ssss", $trans_id, $service_ID, $start_datetime, $service_status);

                    if (!$stmt2->execute()) {
                        echo "Error inserting into service_progress: " . $stmt2->error;
                    }             
                    $stmt2->close();
                     //haha           
                    echo "<script>alert('SA WAKAS NAGSUBMIT NA');</script>";
                    header("Location: index.php");
                }  
                else {
                    echo "Error: " . $stmt->error;
                }






                // auto generation ng beneficiary ID ----------
                $ben_id = '';

                $query = "SELECT Beneficiary_ID FROM beneficiary ORDER BY Beneficiary_ID DESC LIMIT 1";
                $result = $conn->query($query);
                $row = $result->fetch_assoc();

                if ($row && isset($row['Beneficiary_ID']) && preg_match('/^B-(\d+)$/', $row['Beneficiary_ID'], $matches)) {
                    $lastID = intval($matches[1]);
                    $newID = 'B-' . str_pad($lastID + 1, 3, '0', STR_PAD_LEFT);
                } 
                
                else {
                    $newID = 'B-001';
                }

                $ben_id = $newID;
                //----------------end


                $b_Fname = isset($_POST['b_Fname']) ? $_POST['b_Fname'] : '';
                $b_Mname = isset($_POST['b_Mname']) ? $_POST['b_Mname'] : '';
                $b_Lname = isset($_POST['b_Lname']) ? $_POST['b_Lname'] : '';
                $b_status = isset($_POST['b_status']) ? $_POST['b_status'] : '';
                $b_bdate = isset($_POST['b_bdate']) ? date("Y-m-d", strtotime($_POST['b_bdate'])) : null;
                $b_ddate = isset($_POST['b_ddate']) && !empty($_POST['b_ddate']) ? date("Y-m-d", strtotime($_POST['b_ddate'])) : null;


                

                $add_ben_query = "INSERT INTO beneficiary (Beneficiary_ID, MS_service_ID, Fname, Mname, Lname, Beneficiary_Status, Beneficiary_Birthdate, Beneficiary_Deathdate) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

                $stmt = $conn->prepare($add_ben_query);

                if ($stmt === false) {
                    die('MySQL prepare error: ' . $conn->error);
                }

                $stmt->bind_param("ssssssss", $ben_id, $service_ID, $b_Fname, $b_Mname, $b_Lname, $b_status, $b_bdate, $b_ddate);

                if ($stmt->execute()) {

                    echo "<script>alert('BENEFICIARY OKI');</script>";
                    echo "<script>window.location.href='index.php';</script>";


                }
                else{
                    echo "<script>alert('DI NAG ADD BENE');</script>";
                    echo "<script>window.location.href='index.php';</script>";
                }               
            }      
        }      
        else {
            echo "No form data submitted.";
        }
    }

    else {
        header("Location: shop-account-login.php");
    }

    $conn->close();
    

?>