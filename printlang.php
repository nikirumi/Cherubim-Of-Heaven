<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    ----------------------------
        <?php


            $service_ID = isset($_POST['service_ID']) ? $_POST['service_ID'] : null;
            echo "Service ID: " . $service_ID . "<br> <br>";

            $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null;
            echo "Quantity: " . $quantity. "<br> <br>" ;


            echo "------------------------";
        echo "<pre>";
        print_r($_POST); // This will print out all the form data
        echo "</pre>";
        ?>

</body>
</html>