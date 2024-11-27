<?php
    include("connect.php");
    include("check_session.php");

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // Initialize the cart if it doesn't exist
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Check if form data is submitted dynamically
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_name'], $_POST['quantity'])) {
        $product_name = $_POST['product_name'];
        $quantity = intval($_POST['quantity']);

        if (isset($username)) {
            
            $stmt = $conn->prepare("SELECT Service_ID, Service_Name, Service_Price FROM memorial_services WHERE Service_Name = ?");
            $stmt->bind_param("s", $product_name);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $service_id = $row['Service_ID'];
                $service_name = $row['Service_Name'];
                $service_price = $row['Service_Price'];

                if (isset($_SESSION['cart'][$service_id])) {
                    $_SESSION['cart'][$service_id]['quantity'] += $quantity;
                } 
                
                else {
                    $_SESSION['cart'][$service_id] = [
                        'name' => $service_name,
                        'price' => $service_price,
                        'quantity' => $quantity
                    ];
                }

                header("Location: shop-cart.php");
                exit();

            } 
            
            else {
                echo "Product not found.";
            }

        } 
        
        else {
            header("Location: shop-account-login.php");
            exit();
        }
    }

    $conn->close();
?>
