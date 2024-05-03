<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Edit Product</h2>
        <?php
            session_start();
            require_once 'config.php';
            require_once 'functions.php';;

            // Generate CSRF token
            $csrf_token = generateCSRFToken();

            if (!isset($_GET['id'])) {
                header("Location: product_list.php");
                exit();
            }
            $product_id = $_GET['id'];
            $sql = "SELECT * FROM products WHERE id = $product_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $product_name = $row['name'];
                $product_price = $row['price'];
            } else {
                header("Location: product_list.php");
                exit();
            }
        ?>
        <form action="save_product.php" method="POST">
        <label for="name">Product Name:</label>
            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">

            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($product_name); ?>" pattern="[a-zA-Z0-9\s]+" title="Enter a valid product name" required>

            <label for="price">Price:</label>
            <input type="number" id="price" name="price" value="<?php echo htmlspecialchars($product_price); ?>" step="0.01" min="0" required>

            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <input type="submit" value="Save Product">
            <a href="product_list.php">Cancel</a>
        </form>
    </div>
</body>
</html>
