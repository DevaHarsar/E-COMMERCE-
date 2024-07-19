<?php
include('../middleware/adminMiddleware.php');

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

if (isset($_POST['update_status_btn'])) {
    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $sql = "UPDATE orders SET status='$status' WHERE id='$order_id'";
    if ($conn->query($sql) === TRUE) {
        // Redirect back to order details page with a success message
        header("Location: order_details.php?order_id=$order_id&message=Status updated successfully");
    } else {
        // Redirect back to order details page with an error message
        header("Location: order_details.php?order_id=$order_id&message=Error updating status: " . $conn->error);
    }
}
if (isset($_POST['delete_order_btn'])) {
    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
    
    // Start transaction
    mysqli_begin_transaction($conn);

    try {
        // Delete from order_items table
        $delete_order_items_query = "DELETE FROM order_items WHERE order_id='$order_id'";
        if (!$conn->query($delete_order_items_query)) {
            throw new Exception("Error deleting order items: " . $conn->error);
        }

        // Delete from orders table
        $delete_order_query = "DELETE FROM orders WHERE id='$order_id'";
        if (!$conn->query($delete_order_query)) {
            throw new Exception("Error deleting order: " . $conn->error);
        }

        // Commit transaction
        mysqli_commit($conn);

        // Redirect back to order management page with a success message
        header("Location: order_management.php?message=Order deleted successfully");
    } catch (Exception $e) {
        // Rollback transaction
        mysqli_rollback($conn);

        // Redirect back to order details page with an error message
        header("Location: order_details.php?order_id=$order_id&message=" . $e->getMessage());
    }
}

$conn->close();
?>
