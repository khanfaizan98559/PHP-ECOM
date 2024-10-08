<?php
include 'db.php';  // Include database connection

// Fetch all products from the database
$sql = "SELECT p.*, pi.image FROM products p 
LEFT JOIN product_images pi ON p.id = pi.product_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
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
                <li><a href="login.php">Login</a></li>
            </ul>
        </nav>
    </header>

    <section class="products">
        <h2>All Products</h2>
        <div class="product-grid">
            <?php 
            $products = []; // Initialize an array to hold products
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    $productId = $row['id'];
                    if (!isset($products[$productId])) {
                        // If this is the first image for this product, initialize the array
                        $products[$productId] = [
                            'name' => $row['name'],
                            'description' => $row['description'],
                            'price' => $row['price'],
                            'images' => []
                        ];
                    }
                    // Add image to the product's images array
                    $products[$productId]['images'][] = $row['image'];
                }
            }
            ?>

            <?php foreach ($products as $product): ?>
                <div class="product">
                    <h3><?php echo $product['name']; ?></h3>
                    <p><?php echo $product['description']; ?></p>
                    <p>$<?php echo number_format($product['price'], 2); ?></p>
                    <div class="product-images">
                        <?php foreach ($product['images'] as $image): ?>
                            <img src="images/<?php echo $image; ?>" alt="<?php echo $product['name']; ?>">
                        <?php endforeach; ?>
                    </div>
                    <button>Add to Cart</button>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 MyStore. All Rights Reserved.</p>
    </footer>
</body>
</html>
