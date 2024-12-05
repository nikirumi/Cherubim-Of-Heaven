<!DOCTYPE html>
<html lang="en">

<?php

    include("check_session.php");

    $total = 0;
    $transaction_id = '';

    if (isset($_GET['transaction_id']) && isset($_GET['total'])) {
        $transaction_id = $_GET['transaction_id'];
        $total = $_GET['total'];

        $transaction_id = htmlspecialchars($transaction_id);
        $total = htmlspecialchars($total);
    } 
    
    else {
        echo "No payment details found.";
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $update_query = "UPDATE Transaction SET Payment_Status = 'Paid' WHERE Transaction_ID = ?";
        
        if ($stmt = $conn->prepare($update_query)) {

            $stmt->bind_param("s", $transaction_id);

            if ($stmt->execute()) {
                echo "Payment status updated to 'Paid'.";
                header("Location: payment-success.html");
            } 
            else {
                echo "Error updating payment status: " . $stmt->error;
            }

            $stmt->close();
        } 
        
        else {
            echo "Error preparing the query: " . $conn->error;
        }

    }
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Gateway</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f9f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
        }

        form {
            background-color: #ffffff;
            border-radius: 15px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
        }

        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #333;
            margin-bottom: 5px;
            display: block;
        }

        select, input[type="text"], input[type="email"], input[type="number"] {
            width: 100%;
            padding: 12px;
            border: 2px solid #007bff;
            border-radius: 8px;
            margin-bottom: 15px;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        select:focus, input[type="text"]:focus, input[type="email"]:focus, input[type="number"]:focus {
            border-color: #0056b3;
            outline: none;
        }

        .payment-info {
            display: none;
            margin-top: 10px;
        }

        .payment-info input {
            width: 100%;
            padding: 12px;
            margin-bottom: 10px;
            font-size: 14px;
            border-radius: 8px;
            border: 2px solid #007bff;
        }

        button {
            width: 100%;
            background-color: #28a745;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #218838;
        }

        .payment-option {
            margin-bottom: 15px;
        }

        .amount-container {
            font-size: 18px;
            margin-bottom: 20px;
            text-align: center;
            color: #28a745;
        }

            * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(135deg, #4CAF50, #1E88E5);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            overflow: hidden;
        }

        .container {
            width: 100%;
            max-width: 480px;
            padding: 30px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 15px 50px rgba(0, 0, 0, 0.2);
            animation: fadeIn 1s ease-out;
        }

        .payment-form {
            text-align: center;
        }

        .logo img {
            width: 100px;
            margin-bottom: 30px;
        }

        h2 {
            font-size: 28px;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
        }

        p {
            font-size: 16px;
            color: #777;
            margin-bottom: 25px;
        }

        .input-group {
            margin-bottom: 20px;
            text-align: left;
        }

        .input-group label {
            font-size: 16px;
            color: #333;
            margin-bottom: 5px;
        }

        .input-group input,
        .payment-options select {
            width: 100%;
            padding: 15px;
            margin: 8px 0;
            border-radius: 15px;
            border: 1px solid #ddd;
            font-size: 14px;
            background-color: #f9f9f9;
            transition: all 0.3s ease-in-out;
        }

        .input-group input:focus,
        .payment-options select:focus {
            border-color: #1E88E5;
            box-shadow: 0 0 5px rgba(30, 136, 229, 0.5);
        }

        .payment-options select {
            background-color: #fff;
            cursor: pointer;
            transition: background-color 0.3s ease-in-out;
        }

        .payment-options select:hover {
            background-color: #e1f5fe;
        }

        .payment-section {
            display: none;
            margin-bottom: 20px;
        }

        .payment-section input {
            font-size: 14px;
            padding: 12px;
            border-radius: 12px;
            border: 1px solid #ddd;
            transition: all 0.3s ease-in-out;
        }

        .payment-section input:focus {
            border-color: #1E88E5;
            box-shadow: 0 0 5px rgba(30, 136, 229, 0.5);
        }

        .submit-btn {
            width: 100%;
            padding: 14px;
            background-color: #4CAF50;
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            transition: transform 0.3s ease-in-out;
        }

        .submit-btn:hover {
            background-color: #388E3C;
            transform: translateY(-4px);
        }

        .submit-btn:active {
            background-color: #2C6B29;
            transform: translateY(1px);
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 600px) {
            .container {
                padding: 20px;
            }

            h2 {
                font-size: 24px;
            }

            .input-group input {
                padding: 10px;
            }

            .submit-btn {
                padding: 12px;
            }
            h2 {
                    text-align: center;
                    color: #007bff;
                    font-size: 24px;
                    margin-bottom: 20px;
                    text-transform: uppercase;
                    letter-spacing: 2px;
                    font-weight: bold;
                    padding-bottom: 10px;
                    border-bottom: 2px solid #007bff;
                }
        }

    </style>
</head>
<body>
    <form method="post" onsubmit="return processPayment(event)">
        <div class="container">
            <h2>PayFlow</h2>

            <!-- Display Total Amount -->
            <div class="input-group">
                <label for="amount">Amount</label>
                <input type="text" id="amount" name="amount" value="₱ <?php echo $total; ?>" disabled>
            </div>

            <label for="payment-method">Select Payment Method:</label>
            <select required id="payment-method" onchange="togglePaymentInfo()">
                <option value="">--Choose Payment Method--</option>
                <option value="gcash">GCash</option>
                <option value="paypal">PayPal</option>
                <option value="bank">Bank Transfer</option>
            </select>

            <div id="gcash-info" class="payment-info" style="display: none;">
                <label for="gcash-number">GCash Number:</label>
                <input type="tel" id="gcash-number" placeholder="Enter GCash Number" maxlength="11">
            </div>

            <div id="paypal-info" class="payment-info" style="display: none;">
                <label for="paypal-email">PayPal Email:</label>
                <input type="email" id="paypal-email" placeholder="Enter PayPal Email">
            </div>

            <div id="bank-info" class="payment-info" style="display: none;">
                <label for="bank-account">Bank Account Number:</label>
                <input type="text" id="bank-account" placeholder="Enter Bank Account Number">
                
                <label for="bank-name">Bank Name:</label>
                <input type="text" id="bank-name" placeholder="Enter Bank Name">
            </div>

            <button type="submit">Proceed to Payment</button>
        </div>
    </form>

    <script>
        function togglePaymentInfo() {
            const paymentMethod = document.getElementById("payment-method").value;
            document.getElementById("gcash-info").style.display = 'none';
            document.getElementById("paypal-info").style.display = 'none';
            document.getElementById("bank-info").style.display = 'none';
            
            if (paymentMethod === "gcash") {
                document.getElementById("gcash-info").style.display = 'block';
            } else if (paymentMethod === "paypal") {
                document.getElementById("paypal-info").style.display = 'block';
            } else if (paymentMethod === "bank") {
                document.getElementById("bank-info").style.display = 'block';
            }
        }

        function processPayment(event) {
            event.preventDefault();
            const paymentMethod = document.getElementById("payment-method").value;
            let isValid = true;

            if (paymentMethod === "gcash") {
                const gcashNumber = document.getElementById("gcash-number").value;
                if (!gcashNumber) {
                    alert("Please enter your GCash number.");
                    isValid = false;
                }
            } else if (paymentMethod === "paypal") {
                const paypalEmail = document.getElementById("paypal-email").value;
                if (!paypalEmail) {
                    alert("Please enter your PayPal email.");
                    isValid = false;
                }
            } else if (paymentMethod === "bank") {
                const bankAccount = document.getElementById("bank-account").value;
                const bankName = document.getElementById("bank-name").value;
                if (!bankAccount || !bankName) {
                    alert("Please enter both your bank account number and bank name.");
                    isValid = false;
                }
            }

            if (isValid) {
                alert("Payment info submitted successfully!");
                // Add form submission logic here if needed
                document.querySelector("form").submit();
            }
        }
    </script>

</body>
</html>
