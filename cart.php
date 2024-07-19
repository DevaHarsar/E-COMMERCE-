<?php
session_start();

include('functions/userfunctions.php');
include('includes/header.php');
include('authentication.php');
?>

<div class="py-3 bg-secondary">
    <div class="container">
        <h6 class="text-white">
            <a class="text-white" href="index.php">Home / </a>
            <a class="text-white" href="cart.php">Carts</a>
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="row align-items-center">
                    <div class="col-md-2">
                        <h6>Product Image</h6>
                    </div>
                    <div class="col-md-2">
                        <h6>Product Name</h6>
                    </div>
                    <div class="col-md-2">
                        <h6>Price</h6>
                    </div>
                    <div class="col-md-2">
                        <h6>Quantity</h6>
                    </div>
                    <div class="col-md-2">
                        <h6>Remove</h6>
                    </div>
                </div>
                <div id="mycart">
                    <?php 
                    $items = getCartItems(); 
                    $totalPrice = 0;

                    foreach ($items as $citems) {
                        $itemTotal = $citems['selling_price'] * $citems['prod_qty'];
                        $totalPrice += $itemTotal;
                    ?>
                        <div class="card product_data shadow-sm mb-1">
                            <div class="row align-items-center">
                                <div class="col-md-2">
                                    <img src="uploads/<?= $citems['image']; ?>" alt="" width="80px"> 
                                </div>
                                <div class="col-md-2">
                                    <h5><?= $citems['name']; ?></h5>
                                </div>
                                <div class="col-md-2">
                                    <h5>RS <?= $citems['selling_price']; ?></h5>
                                </div>
                                <div class="col-md-2">
                                    <input type="hidden" class="prodId" value="<?= $citems['prod_id']; ?>">
                                    <div class="input-group mb-3" style="width:130px">
                                        <button class="input-group-text decrement-btn updateQty">-</button>
                                        <input type="text" class="form-control text-center input-qty bg-white" value="<?= $citems['prod_qty']; ?>" disabled>
                                        <button class="input-group-text increment-btn updateQty">+</button>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button class="btn btn-danger btn-sm deleteItem" value="<?= $citems['cid']; ?>">
                                        <i class="fa fa-trash me-6"></i>Remove
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col-md-6">
                <h4>Total Price: RS <?= $totalPrice; ?></h4>
                <form action="checkout.php" method="POST">
                    <input type="hidden" name="total_price" value="<?= $totalPrice; ?>">
                    <button type="submit" class="btn btn-primary px-4"><i class="fa fa-shop me-2"></i>Checkout</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include('includes/footer.php');
?>
