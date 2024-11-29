<?php
    include("connect.php");

    // Function to get memorial space details based on ID and return it as an associative array
    function displayAssoc($ID) {
        global $conn; // Ensure the database connection is accessible

        // SQL query to join MEMORIAL_SPACE and MEMORIAL_SERVICES tables based on MS_Service_ID and Service_ID
        $findSpaces = "SELECT 
                        ms.MS_Service_ID, 
                        ms.Space_Type,  
                        ms.Space_Status,  
                        msr.Service_ID, 
                        msr.Service_Name, 
                        msr.Service_Description,   
                        msr.Service_Price,  
                        msr.Service_Type
                        FROM MEMORIAL_SPACE ms 
                        JOIN MEMORIAL_SERVICES msr 
                        ON ms.MS_Service_ID = msr.Service_ID
                        WHERE ms.MS_Service_ID = ?"; // Filtering by MS_Service_ID

        
        if ($stmt = $conn->prepare($findSpaces)) {
            $stmt->bind_param("s", $ID); 
            $stmt->execute();
            $spaceResult = $stmt->get_result();

            if ($spaceResult->num_rows > 0) {
                
                return $spaceResult->fetch_assoc();

            } else {
                return null;
            }

            $stmt->close();
        } else {
            echo "Error preparing statement.<br>";
            return null;
        }
    }

  
    $ID1 = "S-011"; 
    $ID2 = "S-012"; 
    $ID3 = "S-013"; 
    $ID4 = "S-014"; 

    $firstRow = displayAssoc($hardcodedID); 
    $secondRow = displayAssoc($hardcodedID); 
    $thirdRow = displayAssoc($hardcodedID); 
    $fourthRow = displayAssoc($hardcodedID); 

        echo "Space_Service ID: " . $firstRow['MS_Service_ID'] . "<br>";
        echo "Service ID: " . $firstRow['Service_ID'] . "<br>";
        echo "Space Type: " . $firstRow['Space_Type'] . "<br>";
        echo "Space Status: " . $firstRow['Space_Status'] . "<br>";
        echo "Service Name: " . $firstRow['Service_Name'] . "<br>";
        echo "Service Description: " . $firstRow['Service_Description'] . "<br>";
        echo "Service Price: ₱" . $firstRow['Service_Price'] . "<br>";
        echo "Service Type: " . $firstRow['Service_Type'] . "<br><br>";



    
?>

<?php  echo  $row['Service_Name']   ?>
<?php  echo  $row['Service_Price']   ?>


<?php  echo  $row['Service_Name']   ?>

<?php  echo  $row['Service_Name']   ?>

<?php  echo  $row['Service_Name']   ?>



<?php

	session_start();
	include("connect.php");

	$service_id = isset($_GET['id']) ? ($_GET['id']) : 0;				
    
    $findSpaces = "SELECT 
                    ms.MS_Service_ID, 
                    ms.Space_Type,  
                    ms.Space_Status,  
                    msr.Service_ID, 
                    msr.Service_Name, 
                    msr.Service_Description,   
                    msr.Service_Price,  
                    msr.Service_Type
                    FROM MEMORIAL_SPACE ms 
                    JOIN MEMORIAL_SERVICES msr 
                    ON ms.MS_Service_ID = msr.Service_ID
                    WHERE ms.MS_Service_ID = ?"; // Filtering by MS_Service_ID

    $stmt =$conn->prepare($findSpaces);
    $stmt->bind_param("s", $service_id); 
	$stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        echo "Service ID: " . $row['MS_Service_ID'] . "<br>";
        echo "Space Type: " . $row['Space_Type'] . "<br>";
        echo "Space Status: " . $row['Space_Status'] . "<br>";
        echo "Service Name: " . $row['Service_Name'] . "<br>";
        echo "Service Description: " . $row['Service_Description'] . "<br>";
        echo "Service Price: ₱" . $row['Service_Price'] . "<br>";
        echo "Service Type: " . $row['Service_Type'] . "<br><br>";
    }
?>
