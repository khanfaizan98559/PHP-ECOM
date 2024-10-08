<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");  // Redirect to login if not logged in
    exit;
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyStore - Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">Kings & Queens Enterprises</div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <section class="featured-products">
        <h2>Featured Products</h2>
        <div class="product-grid">
            <div class="product">
                <img src="tshirt.jpg" alt="Product 1">
                <h3>Featured Product 1</h3>
                <p>$19.99</p>
                <button>Add to Cart</button>
            </div>
            <div class="product">
                <img src="formalpant.jpg" alt="Product 2">
                <h3>Featured Product 2</h3>
                <p>$29.99</p>
                <button>Add to Cart</button>
            </div>
            <div class="product">
                <img src="uploads/product3.jpg" alt="Product 3">
                <h3>Featured Product 3</h3>
                <p>$39.99</p>
                <button>Add to Cart</button>
            </div>
            <div class="product">
                <img src="uploads/product4.jpg" alt="Product 4">
                <h3>Featured Product 4</h3>
                <p>$49.99</p>
                <button>Add to Cart</button>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Kings & Queens Enterprises. All Rights Reserved.</p>
    </footer>
</body>
</html>
