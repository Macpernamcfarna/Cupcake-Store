<?php
session_start();
include 'database.php';

$orderId = filter_input(INPUT_GET, 'order_id', FILTER_VALIDATE_INT);

if ($orderId === false || $orderId === null || $orderId < 1) {
  $_SESSION['delete'] = 'Invalid order selected.';
  header('Location: ../admin/dashboard.php');
  exit;
}

$stmt = $conn->prepare('DELETE FROM orders WHERE order_id = ?');
$stmt->bind_param('i', $orderId);

if ($stmt->execute()) {
  $_SESSION['delete'] = 'Order has been deleted successfully.';
} else {
  $_SESSION['delete'] = 'The order could not be deleted.';
}

$stmt->close();
$conn->close();
header('Location: ../admin/dashboard.php');
exit;
?>