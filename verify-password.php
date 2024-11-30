<?php
    include("check_session.php"); 

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $passwordCurrent = $_POST['passwordCurrent'];
        $username = $_SESSION['username']; 

        $query = "SELECT Password FROM CLIENT WHERE Username = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();
        $stmt->close();

        if (password_verify($passwordCurrent, $hashedPassword)) {
            echo json_encode(["success" => true]);
        } 
        else {
            echo json_encode(["success" => false]);
        }
    }
?>
