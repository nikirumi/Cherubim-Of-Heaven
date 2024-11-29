<?php

    include("check_session.php");

    $sql = "SELECT Start_Datetime, End_Datetime FROM SERVICE_PROGRESS WHERE Service_status = 'Booked'";
    $result = $conn->query($sql);

    $dates = [];

    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $dates[] = $row;
        }
    }

    echo json_encode($dates);

    $conn->close();

?>