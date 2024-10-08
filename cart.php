<?php
session_start();
include 'db.php';  // Include database connection

// Fetch products details for cart
$cart_items = [];
if (isset($_SESSION['cart'])) {
    foreach ($_SESSION['cart'] as $product_id => $quantity) {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $product_id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $product = $result->fetch_assoc();
            $product['quantity'] = $quantity;
            $cart_items[] = $product;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
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

    <section class="cart">
        <h2>Your Cart</h2>
        <table>
            <tr>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Subtotal</th>
                <th>Action</th>
            </tr>
            <?php
            $total_price = 0;
            foreach ($cart_items as $item) {
                $subtotal = $item['price'] * $item['quantity'];
                $total_price += $subtotal;
                ?>
                <tr>
                    <td><?php echo $item['name']; ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>$<?php echo number_format($item['price'], 2); ?></td>
                    <td>$<?php echo number_format($subtotal, 2); ?></td>
                    <td>
                        <form method="POST" action="remove_from_cart.php">
                            <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                            <button type="submit">Remove</button>
                        </form>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
        <h3>Total: $<?php echo number_format($total_price, 2); ?></h3>
        <a href="checkout.php">Proceed to Checkout</a>
    </section>

    <footer>
        <p>&copy; 2024 MyStore. All Rights Reserved.</p>
    </footer>
</body>
</html>
