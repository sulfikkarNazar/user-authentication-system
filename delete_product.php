<?php
session_start();
require_once 'config.php';
require_once 'functions.php';

// Validate CSRF token
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $csrf_token = $_POST['csrf_token'];
    if (!validateCSRFToken($csrf_token)) {
        $_SESSION['error_message'] = "CSRF token validation failed";
        header("Location: product_list.php");
        exit();
    }
}

if(isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $product_id = $_GET['id'];
    $sql = "DELETE FROM products WHERE id = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    if ($stmt->execute()) {
        $_SESSION['success_message'] = "Product deleted successfully";
    } else {
        $_SESSION['error_message'] = "Error deleting product: " . $conn->error;
    }

    $stmt->close();
} else {
    $_SESSION['error_message'] = "Invalid product ID";
}

header("Location: product_list.php");
exit();
?>
