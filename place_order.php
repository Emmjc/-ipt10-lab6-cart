<?php
session_start();
require 'products.php';

// Generate a random order code
$order_code = substr(md5(uniqid(rand(), true)), 0, 8);

// Get the current date and time
$date_time = date('Y-m-d H:i:s');

// Get the items from the cart
$cart_items = $_SESSION['cart'];

// Calculate the total price
$total_price = 0;
foreach ($cart_items as $item) {
    $total_price += $item['price'];
}

// Prepare the order details for writing to the file
$order_data = "Order Code: $order_code\n";
$order_data .= "Date: $date_time\n";
$order_data .= "Items:\n";

foreach ($cart_items as $item) {
    $order_data .= "Product ID: " . $item['id'] . " | Name: " . $item['name'] . " | Price: " . $item['price'] . " PHP\n";
}
$order_data .= "Total Price: $total_price PHP\n";

// Save the order to a file (orders-[ORDER_CODE].txt)
file_put_contents("orders-$order_code.txt", $order_data);

// Clear the cart
$_SESSION['cart'] = [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Confirmation</title>
</head>
<body>
    <h1>Order Confirmation</h1>
    <p>Thank you for your order!</p>
    <p><strong>Order Code:</strong> <?php echo $order_code; ?></p>
    <p><strong>Total Price:</strong> <?php echo $total_price; ?> PHP</p>
</body>
</html>
