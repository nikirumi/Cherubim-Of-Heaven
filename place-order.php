<?php

    include("check_session.php");

    if ($username) {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
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

            $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
            
            // Calculate total
            $total = 0;
            foreach ($cart as $service_id => $item) {
                $item_total = $item['price'] * $item['quantity'];
                $total += $item_total;
            }

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

            $add_trans_query = "INSERT INTO transaction (Transaction_ID, Client_ID, Transaction_Date, Total_Amount, Payment_Method, Payment_Status, General_Address, Retrieval_Method) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($add_trans_query);

            if ($stmt === false) {
                die('MySQL prepare error: ' . $conn->error);
            }
            
            $stmt->bind_param("sssdssss", $trans_id, $client_id, $current_datetime, $total, $payment_method, $payment_status, $gen_add, $retrieval_method);

            if ($stmt->execute()) {
                echo "Transaction successfully inserted!";

                if (!empty($cart)) {
                $add_service_query = "INSERT INTO service_progress (Transaction_ID, Service_ID, Start_Datetime, Service_status) 
                                      VALUES (?, ?, ?, ?)";
                $stmt2 = $conn->prepare($add_service_query);

                if ($stmt2 === false) {
                    die('MySQL prepare error: ' . $conn->error);
                }

                foreach ($cart as $service_id => $item) {
                    $start_datetime = $current_datetime; // Same as transaction date
                    $service_status = "On Going";
                    $stmt2->bind_param("ssss", $trans_id, $service_id, $start_datetime, $service_status);

                    if (!$stmt2->execute()) {
                        echo "Error inserting into service_progress: " . $stmt2->error;
                    }
                }
                $stmt2->close();
            }

                if (isset($_SESSION['cart'])) {
                    unset($_SESSION['cart']);
                    echo "Cart has been cleared after checkout.";
                }

                header("Location: index.php");
            }  
            
            else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();

        } 
        
        else {
            echo "No form data submitted.";
        }

    }

    else {
        header("Location: shop-account-login.php");
    }

    conn->close();
    

?>