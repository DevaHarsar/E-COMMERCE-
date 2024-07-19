<?php
session_start();

include('functions/userfunctions.php');
include('includes/header.php');
include('authentication.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $address = $_POST['address'];
    $mobile = $_POST['mobile'];
    $paymentMethod = $_POST['payment_method'];
    $totalPrice = $_POST['total_price'];
    $upiId = isset($_POST['upi_id']) ? $_POST['upi_id'] : null;

    $orderId = placeOrder($address, $mobile, $totalPrice, $paymentMethod, $upiId);

    if ($orderId) {
        if ($paymentMethod == 'cash_on_delivery') {
            $_SESSION['order_message'] = "Your order has been placed successfully with Cash on Delivery!";
        } else {
            $_SESSION['order_message'] = "Your order has been placed successfully!";
        }
        header('Location: order_page.php?order_id=' . $orderId);
        exit();
    } else {
        echo "Failed to place the order. Please try again.";
    }
}
?>
