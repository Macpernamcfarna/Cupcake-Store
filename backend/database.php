<?php
    $dbHost = "localhost";
    $dbUser = "root";
    $dbPass = "";
    $dbName = "cake-orders";

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
        die("Oops! Something went wrong: " . $conn->connect_error);
    }

    $conn->set_charset("utf8mb4");
?>