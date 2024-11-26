<?php
    include ("connect.php");
    session_start();

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Initialize the cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if form data is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['Roses'])) {
        // Retrieve product details from the form

        $query = "SELECT Service_ID, Service_Name, Service_Price from memorial_services WHERE Service_Name = 'Roses'";
        $result = $conn->query($query);

        if ($result -> num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                $service_id = $row['Service_ID'];
                $service_name = $row['Service_Name'];
                $service_price = $row['Service_Price'];
            }

            $quantity = intval($_POST['quantity']);

            // Check if item already exists in the cart
            if (isset($_SESSION['cart'][$service_id])) {
                // Update the quantity if it exists
                $_SESSION['cart'][$service_id]['quantity'] += $quantity;
            } 
            
            else {
                // Add a new item to the cart
                $_SESSION['cart'][$service_id] = [
                    'name' => $service_name,
                    'price' => $service_price,
                    'quantity' => $quantity
                ];
            }

            $_SESSION['cart'][$service_id] = [
                'name' => $service_name,
                'price' => $service_price,
                'quantity' => $quantity
            ];

            // Success message
            echo "Item added to cart!";
            echo "$service_id and $quantity";
        }


    }

    $conn->close();
?>