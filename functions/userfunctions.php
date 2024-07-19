<?php 

include('admin/config/dbcon.php');

function getAllActive($table)
{
    global $con;
   $query = "SELECT * FROM $table WHERE status='0'";
   return $query_run=mysqli_query($con,$query);
}
function getIdActive($table,$id)
{
    global $con;
   $query = "SELECT * FROM $table WHERE id='$id' and status='0'";
   return $query_run=mysqli_query($con,$query);
}
function getslugActive($table,$slug)
{
    global $con;
   $query = "SELECT * FROM $table WHERE slug='$slug' and status='0' Limit 1";
   return $query_run=mysqli_query($con,$query);
}
function getCartItems()
{
    global $con;
    $userId=$_SESSION['auth_user']['user_id'];
    $query = "SELECT c.id as cid,c.prod_id,c.prod_qty,p.id as pid,p.name,p.image,p.selling_price 
    FROM carts as c,products as p WHERE c.prod_id=p.id and c.user_id='$userId' ORDER BY c.id DESC";
    return $query_run=mysqli_query($con,$query);
}

function getProductsCategory($category_id)
{
    global $con;
    $query = "SELECT * FROM products WHERE category_id='$category_id' and status='0' ";
    return $query_run=mysqli_query($con,$query);
}


function redirect($url,$message)
{
    $_SESSION['message'] = $message;
    header('Location: '.$url);
    exit();
}


function placeOrder($address, $mobile, $totalPrice, $paymentMethod, $upiId = null) {
    global $con;

    if ($paymentMethod == 'upi' && $upiId) {
        $paymentSuccess = validateUPIPayment($upiId, $totalPrice);
        if (!$paymentSuccess) {
            return false;
        }
    }

    $userId = $_SESSION['auth_user']['user_id'];
    $sql = "INSERT INTO orders (user_id, address, mobile, total_price, payment_method) 
            VALUES ('$userId', '$address', '$mobile', '$totalPrice', '$paymentMethod')";

    if (mysqli_query($con, $sql)) {
        $orderId = mysqli_insert_id($con);

        $items = getCartItems();
        while ($item = mysqli_fetch_assoc($items)) {
            $productId = $item['prod_id'];
            $quantity = $item['prod_qty'];
            $price = $item['selling_price'];
            $sql = "INSERT INTO order_items (order_id, product_id, quantity, price) 
                    VALUES ('$orderId', '$productId', '$quantity', '$price')";
            mysqli_query($con, $sql);
        }

        $sql = "DELETE FROM carts WHERE user_id = '$userId'";
        mysqli_query($con, $sql);

        $_SESSION['auth_user']['last_order_id'] = $orderId;

        return $orderId;
    } else {
        return false;
    }
}
