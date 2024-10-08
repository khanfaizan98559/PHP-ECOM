<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
</head>
<body>
    <h2>Add a New Product</h2>
    
    <form action="process_add_product.php" method="POST" enctype="multipart/form-data">
        <label for="name">Product Name:</label>
        <input type="text" name="name" required><br>

        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br>

        <label for="price">Price:</label>
        <input type="text" name="price" required><br>

        <label for="image">Product Image:</label>
        <input type="file" name="image" accept="image/*" required><br>

        <input type="submit" name="submit" value="Add Product">
    </form>
</body>
</html>
