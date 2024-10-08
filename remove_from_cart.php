<?php
session_start();

// Check if cart exists
if (isset($_SESSION['cart'])) {
    $product_id = $_POST['product_id'];

    // Remove product from cart
    if (array_key_exists($product_id, $_SESSION['cart'])) {
        unset($_SESSION['cart'][$product_id]);
    }
}

header('Location: cart.php'); // Redirect back to cart
?>
