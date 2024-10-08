<?php
include 'db.php';  // Include database connection

// Get product ID from URL
$product_id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    die("Product not found");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['name']; ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">MyStore</div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="products.php">Products</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="add_product.php">Add Product</a></li>
            </ul>
        </nav>
    </header>

    <section class="product-detail">
        <h2><?php echo $product['name']; ?></h2>
        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
        <p><?php echo $product['description']; ?></p>
        <p>Price: $<?php echo number_format($product['price'], 2); ?></p>
        <form method="POST" action="add_to_cart.php">
            <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
            <input type="number" name="quantity" value="1" min="1">
            <button type="submit">Add to Cart</button>
        </form>
    </section>

    <footer>
        <p>&copy; 2024 MyStore. All Rights Reserved.</p>
    </footer>
</body>
</html>
