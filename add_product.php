<?php
session_start();
require_once 'config.php';
require_once 'functions.php';

// Generate CSRF token
$csrf_token = generateCSRFToken();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Add Product</h2>
        <form action="save_product.php" method="POST">
        <label for="name">Product Name:</label>
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
            <input type="text" id="name" name="name" pattern="[a-zA-Z0-9\s]+" title="Enter a valid product name" required>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" step="0.01" min="0" required>

            <input type="submit" value="Save Product">
            <a href="product_list.php">Cancel</a>
        </form>
    </div>
</body>
</html>
