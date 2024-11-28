<?php
    include ("connect.php"); 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Item List </title>
        <link rel="stylesheet" href="css/item-list.css" class="color-switcher-link">
        <!-- <link rel="stylesheet" href="css/main.css" class="color-switcher-link"> -->
    </head>

    
    <body>
        <div id="nav">
            <div id="nav-elements">
                <img src="images/logo.png">
                <div>
                    <h4 class="logo-text color-main">Cherubim Of Heaven</h4>
                    <span class="logo-subtext">Funeral Service</span>
                </div>
            </div>

            <div id="back-button"> <a href="admin.php">Main Menu</a> </div>
        </div>

        
    

        <div id="down">

            <div id="base">

                <form action="" method="post">          
                    <div>
                        <h1>ITEM LIST</h1>
                    </div>

                    <div class="input-row">
                        <div>
                            <input type="text" class="normal" name="service_ID" id="service_ID"  placeholder="ID">
                            <input type="text" class="long" name="service_name" id="service_name"  placeholder="Item Name">
                            <input type="text" class="normal" name="price" id="price"  placeholder="Price">
                            <input type="text" class="normal" name="quantity" id="quantity"  placeholder="Quantity">

                            

                        </div>
                    </div>

                    <div class="input-row">
                        
                        <div>
                            <input type="text" class="normal" name="size" id="size" value="" placeholder="Size">
                            <input type="text" class="longer" name="description" id="description" value="" placeholder="Description">
                        

                        </div>
                    </div>

                    <div id="delete-row">
                        <p>NOTE: ID cannot be updated.</p>
                        <div>
                            <button id="update" type="submit" class=" btn" name="add">Add Item</button>
                            <button id="update" type="submit" class="btn" name="update">Update</button>
                            <button id="delete" type="submit" class=" btn" name="delete">Delete</button>
                        </div>
                    </div>
                
                    
                </form>

                <div id="table">
                    <table>
                        <thead>

                            <tr>
                                <!-- <th>#</th> -->
                                <th>ID</th>
                                <!-- <th>ID2</th> -->
                                <th>Item Name</th>
                                <th>Item Description</th>
                                <th>Item Price</th>
                                <th>Quantity</th>
                                <th>Size</th>
                               
                            </tr>

                        </thead>

                        <tbody>

                        <?php
                                // nireretrieve records from the CLIENT table
                            $stmt = "SELECT mg.MG_Service_ID, ms.Service_ID, ms.Service_Name, ms.Service_Description, ms.Service_Price, mg.Quantity, mg.Size 
                                        FROM MEMORIAL_GOODS mg 
                                        INNER JOIN MEMORIAL_SERVICES ms ON mg.MG_Service_ID = ms.Service_ID";

                            $result = $conn->query($stmt);

                            if (!$result) {
                                die("Error fetching data: " . $conn->error);
                            }

                            $counter = 1;
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['Service_ID'] . "</td>"; 
                                // echo "<td>" . $row['MG_Service_ID'] . "</td>"; 
                                echo "<td>" . $row['Service_Name'] . "</td>"; 
                                echo "<td>" . $row['Service_Description'] . "</td>"; 
                                echo "<td>" . $row['Service_Price'] . "</td>"; 
                                echo "<td>" . $row['Quantity'] . "</td>";
                                echo "<td>" . $row['Size'] . "</td>"; 
                            }
                            ?>
                        </tbody>
                    </table>
                </div>             
            </div>
        </div>     
    </body>
</html>

<?php
    $query = "SELECT * FROM client"; 
    $result = $conn->query($query);

    if (!$result) {
        die("Error fetching data: " . mysqli_error($conn));
    }

?>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        //ad
        if( isset($_POST['add']) ){
            $service_ID = filter_var($_POST['service_ID'], FILTER_SANITIZE_SPECIAL_CHARS);
            $service_name = filter_var($_POST['service_name'], FILTER_SANITIZE_SPECIAL_CHARS);
            $description = filter_var($_POST['description'], FILTER_SANITIZE_SPECIAL_CHARS);
            $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
            $service_type = 'Goods';

            $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);
            $size = filter_var($_POST['size'], FILTER_SANITIZE_SPECIAL_CHARS);

            if (empty($service_ID) || empty($service_name) || empty($description) || empty($price) || empty($quantity)) {
                echo "<script>alert('Please fill in all required fields.');</script>";
            }
            else{

                // if mag aadd ng goods lang -----------
                // $service_stmt = $conn->prepare(" INSERT INTO memorial_services (Service_Name, Service_Description, Service_Price, Service_Type) VALUES (?,?,?,?)" );
                // $service_stmt -> bind_param("ssds", $service_name, $description, $price, $service_type);

                // if mag aadd ng goods kasabay sa service ------------
                $service_stmt = $conn->prepare(" INSERT INTO memorial_services VALUES (?,?,?,?,?)" );
                $service_stmt -> bind_param("sssds", $service_ID, $service_name, $description, $price, $service_type);

                if ($service_stmt->execute()){

                    $goods_stmt = $conn->prepare(" INSERT INTO memorial_goods VALUES (?,?,?)" );
                    $goods_stmt -> bind_param("sis", $service_ID, $quantity, $size);
                    
                    if ($goods_stmt->execute()) {
                        echo "<script>alert('Add Item Successful');</script>";
                        echo "<script>window.location.href='item-list.php';</script>";

                    } else {
                        echo "Error adding goods: " . $goods_stmt->error;
                    }
                    $goods_stmt->close();
                }
            $service_stmt->close();
            }
        }

        //apdeyt
        else if( isset($_POST['update']) ){
            $service_ID = filter_var($_POST['service_ID'], FILTER_SANITIZE_SPECIAL_CHARS);

            if(!empty($_POST['service_ID'])){

                if (empty($_POST['service_name']) && empty($_POST['description']) && empty($_POST['price']) && empty($_POST['quantity']) && empty($_POST['size'])){
                    echo "<script>alert('At least one field must be filled out to proceed with the update.');</script>";
                }
                else{

                    if(!empty($_POST['service_name'])){
                    
                        $service_name = filter_var($_POST['service_name'], FILTER_SANITIZE_SPECIAL_CHARS);
                        $stmt = $conn->prepare("UPDATE memorial_services SET Service_Name = ? WHERE Service_ID = ?");
                        $stmt->bind_param("ss", $service_name, $service_ID); 
                        $stmt->execute();
                        echo "<script>alert('Update Successful');</script>";
                        echo "<script>window.location.href='item-list.php';</script>";
                        $stmt->close();
                    }
                  
                    if (!empty($_POST['description'])) {
                        $description = filter_var($_POST['description'], FILTER_SANITIZE_SPECIAL_CHARS);
                        $stmt = $conn->prepare("UPDATE memorial_services SET Service_Description = ? WHERE Service_ID = ?");
                        $stmt->bind_param("ss", $description, $service_ID);
                        $stmt->execute();
                        echo "<script>alert('Update Successful');</script>";
                        echo "<script>window.location.href='item-list.php';</script>";
                        $stmt->close();
                    }
                   
                    if (!empty($_POST['price'])) {
                        $price = filter_var($_POST['price'], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
                        $stmt = $conn->prepare("UPDATE memorial_services SET Service_Price = ? WHERE Service_ID = ?");
                        $stmt->bind_param("ds", $price, $service_ID);
                        $stmt->execute();
                        echo "<script>alert('Update Successful');</script>";
                        echo "<script>window.location.href='item-list.php';</script>";
                        $stmt->close();
                    }
                    
                    if (!empty($_POST['quantity'])) {
                        $quantity = filter_var($_POST['quantity'], FILTER_SANITIZE_NUMBER_INT);
                        $stmt = $conn->prepare("UPDATE memorial_goods SET Quantity = ? WHERE MG_Service_ID = ?");
                        $stmt->bind_param("is", $quantity, $service_ID);
                        $stmt->execute();
                        echo "<script>alert('Update Successful');</script>";
                        echo "<script>window.location.href='item-list.php';</script>";
                        $stmt->close();
                    }
                    
                    if (!empty($_POST['size'])) {
                        $size = filter_var($_POST['size'], FILTER_SANITIZE_SPECIAL_CHARS);
                        $stmt = $conn->prepare("UPDATE memorial_goods SET Size = ? WHERE MG_Service_ID = ?");
                        $stmt->bind_param("ss", $size, $service_ID);
                        $stmt->execute();
                        echo "<script>alert('Update Successful');</script>";
                        echo "<script>window.location.href='item-list.php';</script>";
                        $stmt->close();
                    }
                }                     
            }
        }

        //dilit
        else if(isset($_POST['delete']) ){  

            $service_ID = filter_var($_POST['service_ID'], FILTER_SANITIZE_SPECIAL_CHARS);

            if (!empty($service_ID)) {
                $stmt = $conn->prepare("DELETE FROM memorial_goods WHERE MG_Service_ID = ?");
                $stmt->bind_param("s", $service_ID);

                // if hindi nadedelete yung associated service table ----------------------
                // $stmt->execute();
                // echo "<script>alert('Item successfully deleted');</script>";
                // echo "<script>window.location.href='item-list.php';</script>";
                // $stmt->close();

                // if nadedelete yung associated service table ----------------------
                if($stmt->execute()){
                    $stmt2 = $conn->prepare("DELETE FROM memorial_services WHERE Service_ID = ?");
                    $stmt2->bind_param("s", $service_ID);
                    $stmt2->execute();
                    echo "<script>alert('Item successfully deleted');</script>";
                    echo "<script>window.location.href='item-list.php';</script>";
                     $stmt->close();
                }
            } else {
                echo "<script>alert('Please provide a valid Service ID');</script>";
            }           
        }        
    }
?>



