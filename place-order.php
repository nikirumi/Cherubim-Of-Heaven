<?php

    include("check_session.php");

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

        if ($row) {
             $lastID = intval(substr($row['Transaction_ID'], 2));
             $newID = 'TR-' . str_pad($lastID + 1, 3, '0', STR_PAD_LEFT);
        } 
        
		else {
             $newID = 'TR-001';
        }

        $trans_id = $newID;

        $current_datetime = date("Y-m-d H:i:s");

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

    conn->close();
    

?>