<?php
session_start();

include('functions/userfunctions.php');
include('includes/header.php');
include('authentication.php');

if (!isset($_GET['order_id'])) {
    header('Location: index.php');
    exit();
}

$order_id = $_GET['order_id'];
$user_id = $_SESSION['auth_user']['user_id'];

global $con;

// Retrieve the order details
$order_query = "SELECT * FROM orders WHERE id='$order_id' AND user_id='$user_id'";
$order_result = mysqli_query($con, $order_query);

if (!$order_result) {
    die('Error fetching order: ' . mysqli_error($con));
}

$order = mysqli_fetch_assoc($order_result);

if (!$order) {
    echo "Order not found or unauthorized access.";
    exit();
}

// Retrieve order items
$order_items_query = "SELECT oi.*, p.name, p.image FROM order_items oi
                     INNER JOIN products p ON oi.product_id = p.id
                     WHERE oi.order_id='$order_id'";
$order_items_result = mysqli_query($con, $order_items_query);

if (!$order_items_result) {
    die('Error fetching order items: ' . mysqli_error($con));
}
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4>Order Details</h4>
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Order ID: <?= $order['id']; ?></h5>
                        <p class="card-text">Total Price: RS <?= $order['total_price']; ?></p>
                        <p class="card-text">Payment Method: <?= $order['payment_method']; ?></p>
                        <p class="card-text">Order Status: <?= $order['status']; ?></p>
                        <p class="card-text">Address: <?= $order['address']; ?></p>
                        <p class="card-text">Mobile: <?= $order['mobile']; ?></p>
                    </div>
                </div>

                <h5>Order Items:</h5>
                <?php while ($item = mysqli_fetch_assoc($order_items_result)) { ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="uploads/<?= $item['image']; ?>" alt="<?= $item['name']; ?>" class="img-fluid">
                                </div>
                                <div class="col-md-4">
                                    <h6><?= $item['name']; ?></h6>
                                </div>
                                <div class="col-md-2">
                                    <p>Quantity: <?= $item['quantity']; ?></p>
                                </div>
                                <div class="col-md-2">
                                    <p>Price: RS <?= $item['price']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>
