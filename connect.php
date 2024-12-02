<?php

    $server = "localhost";
    $username = "root";
    $password = "";
    $db = "cherubim 2";

    $conn = new mysqli($server, $username, $password, $db);

    if ($conn->connect_error) {
        die("Connection failed. Reason: ". $conn->connect_error);
    }

?>