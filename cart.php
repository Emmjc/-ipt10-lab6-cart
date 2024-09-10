<?php
session_start();
require 'products.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shopping Cart</title>
</head>
<body>
    <h1>Your Cart</h1>
    <ul>
        <?php if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <li>
                    <?php echo $item['name']; ?> - <?php echo $item['price']; ?> PHP
                </li>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Your cart is empty.</li>
        <?php endif; ?>
    </ul>

    <a href="index.php">Go back to Products</a><br>
    <a href="reset-cart.php">Clear my cart</a><br>
    <a href="place_order.php">Place the order</a>
</body>
</html>
