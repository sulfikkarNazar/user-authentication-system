<?php
session_start();
require_once 'config.php';
require_once 'functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $csrf_token = $_POST['csrf_token'];
    if (!validateCSRFToken($csrf_token)) {
        $_SESSION['error_message'] = "CSRF token validation failed";
        header("Location: add_product.php");
        exit();
    }

    $name = $_POST['name'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, price) VALUES ('$name', '$price')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['success_message'] = "New product created successfully";
        header("Location: product_list.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Error: " . $sql . "<br>" . $conn->error;
        header("Location: add_product.php");
        exit();
    }
}

header("Location: add_product.php");
exit();
?>
