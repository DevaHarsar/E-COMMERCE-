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

// Fetch orders with product details
$sql = "SELECT o.id, o.user_id, o.address, o.mobile, o.total_price, o.payment_method, o.status, o.created_at,
               GROUP_CONCAT(p.name SEPARATOR '<br> ') AS products,
               GROUP_CONCAT(oi.quantity SEPARATOR '<br> ') AS quantities
        FROM orders o
        JOIN order_items oi ON o.id = oi.order_id
        JOIN products p ON oi.product_id = p.id
        GROUP BY o.id";
$result = $conn->query($sql);
?>

<div class="container py-5">
    <h2>Order Management</h2>
    <?php if ($result->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Order ID</th>
                        <th>User ID</th>
                        <th>Address</th>
                        <th>Mobile</th>
                        <th>Products</th>
                        <th>Quantities</th>
                        <th>Total Price</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $row["id"]; ?></td>
                            <td><?= $row["user_id"]; ?></td>
                            <td><?= $row["address"]; ?></td>
                            <td><?= $row["mobile"]; ?></td>
                            <td><?= $row["products"]; ?></td>
                            <td><?= $row["quantities"]; ?></td>
                            <td>RS <?= $row["total_price"]; ?></td>
                            <td><?= $row["payment_method"]; ?></td>
                            <td><?= $row["status"]; ?></td>
                            <td><?= $row["created_at"]; ?></td>
                            <td>
                                <a href="order_details.php?order_id=<?= $row["id"]; ?>" class="btn btn-primary btn-sm">View</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p>No orders found.</p>
    <?php endif; ?>
</div>

<?php
$conn->close();
include('includes/footer.php');
?>
