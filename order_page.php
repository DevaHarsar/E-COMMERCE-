<?php
session_start();

include('functions/userfunctions.php');
include('includes/header.php');
include('authentication.php');

global $con;
$user_id = $_SESSION['auth_user']['user_id'];

// Fetch all orders for the current user
$query = "SELECT * FROM orders WHERE user_id='$user_id' ORDER BY created_at DESC";
$result = mysqli_query($con, $query);
?>

<div class="py-5">
    <div class="container">
        <h4>Your Orders</h4>
        <div class="row">
            <div class="col-md-8">
                <?php while ($order = mysqli_fetch_assoc($result)) { ?>
                    <div class="card mb-3">
                        <div class="card-body">
                            <h5 class="card-title">Order ID: <?= $order['id']; ?></h5>
                            <p class="card-text">Total Price: RS <?= $order['total_price']; ?></p>
                            <p class="card-text">Payment Method: <?= $order['payment_method']; ?></p>
                            <p class="card-text">Order Status: <?= $order['status']; ?></p>
                            <a href="order_page_details.php?order_id=<?= $order['id']; ?>" class="btn btn-primary">View Order</a>
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
