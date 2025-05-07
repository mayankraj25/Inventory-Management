<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
include 'db.php';

$message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $category = $_POST['category'];
    $supplier = $_POST['supplier'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, category, supplier, quantity, price)
            VALUES ('$name', '$category', '$supplier', '$quantity', '$price')";
    if ($conn->query($sql)) {
        $message = "Product added successfully!";
    } else {
        $message = "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>
<div class="navbar">
    <a href="index.php">🏠 Home</a>
    <a href="view_products.php">📦 View Products</a>
    <a href="logout.php">🚪 Logout</a>
</div>
<div class="container">
    <h2 class="animate__animated animate__fadeInDown">Add Product</h2>
    <?php if ($message): ?>
        <div class="alert success animate__animated animate__fadeInUp"><?= $message ?></div>
    <?php endif; ?>
    <form method="post" class="animate__animated animate__fadeIn">
        <label for="name">Product Name</label>
        <input type="text" id="name" name="name" placeholder="Enter product name" required>
        
        <label for="category">Category</label>
        <input type="text" id="category" name="category" placeholder="Enter category">
        
        <label for="supplier">Supplier</label>
        <input type="text" id="supplier" name="supplier" placeholder="Enter supplier">
        
        <label for="quantity">Quantity</label>
        <input type="number" id="quantity" name="quantity" placeholder="Enter quantity" required>
        
        <label for="price">Price</label>
        <input type="number" id="price" name="price" step="0.01" placeholder="Enter price" required>
        
        <button type="submit" class="btn btn-primary animate__animated animate__zoomIn">Add Product</button>
    </form>
</div>
</body>
</html>