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
            $service_id = isset($_POST['service_id']) ? $_POST['service_id'] : '';
            $start_date = isset($_POST['start_date']) ? $_POST['start_date'] : '';
            $end_date = isset($_POST['end_date']) ? $_POST['end_date'] : '';
            $total = isset($_POST['total']) ? $_POST['total'] : '';

            $gen_add =  $billing_hnum . " " . $billing_sname . ", " . $billing_purok . " " . $billing_barangay . ", Hagonoy, Bulacan";

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
            //$start_datetime = date("Y-m-d H:i:s");

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

                //header("Location: index.php");
            }  
            
            else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();

            // For SERVICE PROGRESS ito

            $start_date_obj = DateTime::createFromFormat('m/d/Y', $start_date);
            $end_date_obj = DateTime::createFromFormat('m/d/Y', $end_date);
            $start_date_formatted = $start_date_obj ? $start_date_obj->format('Y-m-d') : '';
            $end_date_formatted = $end_date_obj ? $end_date_obj->format('Y-m-d') : '';

            $add_prog = "INSERT INTO Service_Progress (Transaction_ID, Service_ID, Service_status, Start_Datetime, End_Datetime) 
                VALUES (?, ?, ?, ?, ?)";

            $stmt = $conn->prepare($add_prog);

            if ($stmt === false) {
                die('MySQL prepare error: ' . $conn->error);
            }

            $stmt->bind_param("sssss", $trans_id, $service_id, $service_status, $start_date_formatted, $end_date_formatted);

            if ($stmt->execute()) {
                echo "Transaction successfully inserted!";

                if ($payment_method === "Other") {
                    header("Location: payment-gateway.php?transaction_id=" . urlencode($trans_id) . "&total=" . urlencode($total));
                    exit();
                }

                else {
                header("Location: index.php");
                }
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