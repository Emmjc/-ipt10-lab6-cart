<?php
session_start();
require 'products.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = $_POST['product_id'];
    
    // Check if product exists in the products list
    foreach ($products as $product) {
        if ($product['id'] == $product_id) {
            // Add the product directly to the cart without checking for quantity
            $_SESSION['cart'][] = $product;
            break;
        }
    }
}
// Redirect back to products browsing page
header('Location: index.php');
?>
