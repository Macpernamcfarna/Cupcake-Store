<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'database.php';

if (isset($_POST['create'])) {
    // Get data from your cake order form
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_phone = $_POST['customer_phone'];
    $cake_choice = $_POST['cake_choice'];
    $special_instructions = $_POST['special_instructions'];
    $payment_method = $_POST['payment_method'];
    $order_status = $_POST['order_status'] ?? "pending";

    $sql = "INSERT INTO orders (customer_name, customer_email, customer_phone, cake_choice, special_instructions, payment_method, order_status) VALUES (?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param(
        "sssssss",
        $customer_name,
        $customer_email,
        $customer_phone,
        $cake_choice,
        $special_instructions,
        $payment_method,
        $order_status
    );

    if ($stmt->execute() === TRUE) {
        session_start();
        $_SESSION['create'] = "Order has been created successfully!";
        header("Location: ../public/success.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}