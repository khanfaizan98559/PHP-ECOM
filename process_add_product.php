<?php
include 'db.php';  // Include your database connection

if (isset($_POST['submit'])) {
    // Collect form data
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    // Handle image upload
    $target_dir = "C:\\xamp\\htdocs\\php ecommerce\\images\\";  // Folder where images will be stored
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validate image file type
    $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($imageFileType, $allowed_types)) {
        // Upload image
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // Insert product into the database
            $sql = "INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssds", $name, $description, $price, $target_file);
            if ($stmt->execute()) {
                echo "New product added successfully.";
                header('Location: products.php'); // Redirect to products page
            } else {
                echo "Error: " . $stmt->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
}
?>
