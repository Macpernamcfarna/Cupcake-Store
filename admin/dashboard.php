<?php
session_start();
include '../backend/database.php';

$statsResult = $conn->query(
    "SELECT COUNT(*) AS total_orders,
            COUNT(DISTINCT customer_email) AS total_customers,
            SUM(order_status = 'pending') AS pending_orders
     FROM orders"
);
$stats = $statsResult ? $statsResult->fetch_assoc() : [
    'total_orders' => 0,
    'total_customers' => 0,
    'pending_orders' => 0
];

$ordersResult = $conn->query("SELECT * FROM orders ORDER BY order_id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Happy Sprinkles Bakery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <!-- Admin Navigation -->
    <nav class="navbar navbar-dark bg-dark">
        <div class="container">
            <span class="navbar-brand">
                <i class="fas fa-cake text-warning"></i> Admin Panel
            </span>
            <div>
                <span class="text-light me-3">Welcome, Admin</span>
                <a href="../public/index.php" class="btn btn-outline-light btn-sm">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-2">
            <!-- Main Content -->
            <div class="container">
                <div class="row">
                    <!-- Stats Cards -->
                    <div class="col-md-4 mb-3">
                        <div class="card bg-primary text-white">
                            <div class="card-body">
                                <h5 class="card-title">Total Orders</h5>
                                <h2><?php echo (int) $stats['total_orders']; ?></h2>
                                <small>All submitted orders</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card bg-success text-white">
                            <div class="card-body">
                                <h5 class="card-title">Revenue</h5>
                                <h2><?php echo (int) $stats['pending_orders']; ?></h2>
                                <small>Orders awaiting confirmation</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card bg-warning text-white">
                            <div class="card-body">
                                <h5 class="card-title">New Customers</h5>
                                <h2><?php echo (int) $stats['total_customers']; ?></h2>
                                <small>Unique customer emails</small>
                            </div>
                        </div>
                    </div>
                </div>

            <?php if(isset($_SESSION["delete"])){ ?>
                <div class="alert alert-success">
                    <?php echo htmlspecialchars($_SESSION["delete"], ENT_QUOTES, 'UTF-8'); unset($_SESSION["delete"]); ?>
                </div>
            <?php } ?>

                <!-- Recent Orders Table -->
                <div class="card shadow-sm table-responsive">
                    <div class="card-header bg-white">
                        <h5 class="mb-0" style="color: black;">Recent Orders</h5>
                    </div>
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Customer</th>
                                        <th>Phone</th>
                                        <th>Cake Choice</th>
                                        <th>special_instructions</th>
                                        <th>Payment</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                        <th>Remove</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if ($ordersResult && $ordersResult->num_rows > 0) {
                                    while($row = $ordersResult->fetch_assoc()){
                                        // Badge color for status
                                        $badge = 'bg-secondary';
                                        if($row['order_status'] == 'pending') $badge = 'bg-warning';
                                        if($row['order_status'] == 'confirmed') $badge = 'bg-primary';
                                        if($row['order_status'] == 'delivered') $badge = 'bg-success';
                                        if($row['order_status'] == 'cancelled') $badge = 'bg-danger';
                                    ?>
                                    <tr>
                                        <td>#<?php echo (int) $row['order_id']; ?></td>
                                        <td>
                                            <?php echo htmlspecialchars($row['customer_name'], ENT_QUOTES, 'UTF-8'); ?><br>
                                            <small class="text-muted"><?php echo htmlspecialchars($row['customer_email'], ENT_QUOTES, 'UTF-8'); ?></small>
                                        </td>
                                        <td><?php echo htmlspecialchars($row['customer_phone'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($row['cake_choice'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($row['special_instructions'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><?php echo htmlspecialchars($row['payment_method'], ENT_QUOTES, 'UTF-8'); ?></td>
                                        <td><span class="badge <?php echo $badge; ?>"><?php echo htmlspecialchars(ucfirst($row['order_status']), ENT_QUOTES, 'UTF-8'); ?></span></td>
                                        <td>
                                            <a href="order.php?id=<?php echo (int) $row['order_id']; ?>" class="btn btn-sm btn-info">View</a>
                                        </td>
                                        <td>
                                            <a href="../backend/delete.php?order_id=<?php echo (int) $row['order_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                        </td>
                                    </tr>
                                    <?php }
                                    } else { ?>
                                    <tr>
                                        <td colspan="9" class="text-center">No orders found.</td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>