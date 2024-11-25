<?php

    include ("connect.php");

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $username = isset($_SESSION['username']) ? $_SESSION['username'] : null;
    $login_text = "Login";

    if ($username) {
        $login_text = $username;
    }

    else {
        echo "";
        $login_text = "Login";
    }

?>