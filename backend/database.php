<?php
    $envPath = dirname(__DIR__) . DIRECTORY_SEPARATOR . '.env';
    $env = is_file($envPath) ? parse_ini_file($envPath, false, INI_SCANNER_RAW) : [];

    if ($env === false) {
        die('Unable to read .env configuration.');
    }

    $dbHost = $env['DB_HOST'] ?? 'localhost';
    $dbUser = $env['DB_USER'] ?? 'root';
    $dbPass = $env['DB_PASS'] ?? '';
    $dbName = $env['DB_NAME'] ?? 'cake-orders';

    $conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

    if ($conn->connect_error) {
        die("Oops! Something went wrong: " . $conn->connect_error);
    }

    $conn->set_charset("utf8mb4");
?>