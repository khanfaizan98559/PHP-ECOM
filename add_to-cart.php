<?php
session_start();
include 'db.php';  // Include database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    // Check if the cart session exists
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Add product to the cart
    if (array_key_exists($product_id, $_SESSION['cart'])) {
        $_SESSION['cart'][$product_id] += $quantity; // Update quantity
    } else {
        $_SESSION['cart'][$product_id] = $quantity; // Add new item
    }

    header('Location: cart.php'); // Redirect to cart page
}
?>
