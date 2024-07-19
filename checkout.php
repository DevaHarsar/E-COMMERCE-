<?php
session_start();

include('functions/userfunctions.php');
include('includes/header.php');
include('authentication.php');

// Initialize variables
$totalPrice = 0;
$items = [];

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['total_price'])) {
        $totalPrice = $_POST['total_price'];
    }
    $items = getCartItems();
} else {
    // For GET requests, you might want to load cart items from the session or database
    $items = getCartItems(); // Assume this function fetches the cart items
    foreach ($items as $item) {
        $totalPrice += $item['selling_price'] * $item['prod_qty'];
    }
}
?>

<div class="py-3 bg-secondary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php">Home / </a>
            <a class="text-white" href="cart.php">Carts / </a>
            <a class="text-white" href="checkout.php">Checkout</a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4>Billing Information</h4>
                <form action="place_order.php" method="POST">
                    <div class="mb-3">
                        <label for="address" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label">Mobile Number</label>
                        <input type="text" class="form-control" id="mobile" name="mobile" required>
                    </div>
                    <hr>
                    <br>
                    <h4>Order Summary</h4>
                    <?php if (!empty($items)) { ?>
                        <?php foreach ($items as $citems) { ?>
                            <div class="card product_data shadow-sm mb-3">
                                <div class="row align-items-center">
                                    <div class="col-md-2">
                                        <img src="uploads/<?= $citems['image']; ?>" alt="" width="80px"> 
                                    </div>
                                    <div class="col-md-4">
                                        <h5><?= $citems['name']; ?></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>RS <?= $citems['selling_price']; ?></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <h5><?= $citems['prod_qty']; ?></h5>
                                    </div>
                                    <div class="col-md-2">
                                        <h5>RS <?= $citems['selling_price'] * $citems['prod_qty']; ?></h5>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    <?php } else { ?>
                        <p>No items in the cart.</p>
                    <?php } ?>

                    <h4>Total Price: RS <?= $totalPrice; ?></h4>

                    <h4>Payment Method</h4>
                    <div class="mb-3">
                        <select class="form-select" name="payment_method" id="payment_method" required>
                            <option value="cash_on_delivery">Cash on Delivery</option>
                            <option value="credit_card">Credit Card</option>
                            <option value="upi">UPI</option>
                        </select>
                    </div>

                    <div class="mb-3" id="upi_id_div" style="display: none;">
                        <label for="upi_id" class="form-label">UPI ID</label>
                        <input type="text" class="form-control" id="upi_id" name="upi_id">
                    </div>

                    <input type="hidden" name="total_price" value="<?= $totalPrice; ?>">

                    <button type="submit" class="btn btn-primary">Place Order</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('payment_method').addEventListener('change', function() {
    var paymentMethod = this.value;
    var upiIdDiv = document.getElementById('upi_id_div');
    if (paymentMethod === 'upi') {
        upiIdDiv.style.display = 'block';
    } else {
        upiIdDiv.style.display = 'none';
    }
});
</script>

<?php
include('includes/footer.php');
?>
