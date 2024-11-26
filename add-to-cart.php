<?php
session_start();
include 'connect.php';

if (isset($_POST['Service_ID'])) {
    $serviceID = $_POST['service_id'];

    $query = "SELECT Service_Name, Service_Description, Service_Price,Service_Type  FROM Memorial_Services WHERE ServiceID = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("i", $serviceID);
    $stmt->execute();
    $result = $stmt->get_result();
    $service = $result->fetch_assoc();

    if ($service) {
        $serviceName = $service['Service_Name'];
        $serviceDescription = $service['Service_Description'];
        $servicePrice = $service['Service_Price'];
        $serviceType = $service['StoService_Type'];

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        $cartKey = $productID;

        if (isset($_SESSION['cart'][$cartKey])) {
            if ($_SESSION['cart'][$cartKey]['quantity'] < $productStock) {
                $_SESSION['cart'][$cartKey]['quantity']++;
            } else {
                echo "<p>Sorry, the stock is limited to $productStock items.</p>";
            }
        } else {
            $_SESSION['cart'][$cartKey] = [
                'product_id' => $productID,
                'name' => $productName,
                'category' => $productCategory,
                'price' => $productPrice,
                'stock' => $productStock,
                'quantity' => 1
            ];
        }
    }

    header('Location: cart.php');
    exit;
}
?>