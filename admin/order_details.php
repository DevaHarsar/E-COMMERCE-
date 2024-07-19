<?php
include('../middleware/adminMiddleware.php');
include('includes/header.php');

// Connect to the database
$host = "localhost";
$username = "root";
$password = "";
$database = "jewelery";

$conn = mysqli_connect($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if order_id is set in the URL
if (isset($_GET['order_id'])) {
    $order_id = mysqli_real_escape_string($conn, $_GET['order_id']);
    $sql = "SELECT o.id, o.user_id, o.address, o.mobile, o.total_price, o.payment_method, o.status, o.created_at,
                   GROUP_CONCAT(p.name SEPARATOR '<br> ') AS products,
                   GROUP_CONCAT(oi.quantity SEPARATOR '<br> ') AS quantities
            FROM orders o
            JOIN order_items oi ON o.id = oi.order_id
            JOIN products p ON oi.product_id = p.id
            WHERE o.id = '$order_id'
            GROUP BY o.id";
    $result = $conn->query($sql);
    $order = $result->fetch_assoc();
} else {
    die("Invalid order ID.");
}
?>

<div class="container py-5">
    <h2>Order Details</h2>
    <?php if (isset($_GET['message'])): ?>
    <div class="alert alert-info">
        <?= htmlspecialchars($_GET['message']); ?>
    </div>
    <?php endif; ?>

    <?php if ($order): ?>
        <div class="card">
            <div class="card-body">
                <h5>Order ID: <?= $order["id"]; ?></h5>
                <p>User ID: <?= $order["user_id"]; ?></p>
                <p>Address: <?= $order["address"]; ?></p>
                <p>Mobile: <?= $order["mobile"]; ?></p>
                <p>Products: <?= $order["products"]; ?></p>
                <p>Quantities: <?= $order["quantities"]; ?></p>
                <p>Total Price: RS <?= $order["total_price"]; ?></p>
                <p>Payment Method: <?= $order["payment_method"]; ?></p>
                <p>Status: <?= $order["status"]; ?></p>
                <p>Created At: <?= $order["created_at"]; ?></p>

                <!-- Update status form -->
                <form action="update_status.php" method="POST" class="mb-3">
                    <input type="hidden" name="order_id" value="<?= $order["id"]; ?>">
                    <div class="form-group">
                        <label for="status">Update Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="pending" <?= $order["status"] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                            <option value="shipped" <?= $order["status"] == 'shipped' ? 'selected' : ''; ?>>Shipped</option>
                            <option value="delivered" <?= $order["status"] == 'delivered' ? 'selected' : ''; ?>>Delivered</option>
                            <option value="cancelled" <?= $order["status"] == 'cancelled' ? 'selected' : ''; ?>>Cancelled</option>
                        </select>
                    </div>
                    <button type="submit" name="update_status_btn" class="btn btn-primary">Update Status</button>
                </form>

                <!-- Delete order form -->
                <form action="update_status.php" method="POST">
                    <input type="hidden" name="order_id" value="<?= $order["id"]; ?>">
                    <button type="submit" name="delete_order_btn" class="btn btn-danger">Delete Order</button>
                </form>
            </div>
        </div>
    <?php else: ?>
        <p>No order details found.</p>
    <?php endif; ?>
</div>

<?php
$conn->close();
include('includes/footer.php');
?>
