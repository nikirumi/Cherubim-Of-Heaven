<?php
    session_start();
    //include("connect.php");
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    if (isset($_GET['service_id'])) {
        $service_id = $_GET['service_id'];
        echo "Service ID: $service_id"; // Debug message for service_id

        if (isset($_SESSION['cart'][$service_id])) {
            //$_SESSION['cart'][$service_id]['removed'] = true;
            unset($_SESSION['cart'][$service_id]);
            echo "Item removed"; // Debug message for removal
        }

        header("Location: shop-cart.php");
        exit();
    } 

    else {
        echo "No service selected for removal.";
    }
?>


