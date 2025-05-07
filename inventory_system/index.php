<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory System</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Inventory System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">🏠 Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="add_product.php">➕ Add Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="view_products.php">📦 View Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">🚪 Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<div class="container text-center mt-5">
    <h1 class="animate__animated animate__fadeInDown">Welcome to the Inventory Management System</h1>
    <p class="lead animate__animated animate__fadeInUp">Effortlessly manage your products with our simple and intuitive interface.</p>
    <div class="mt-4">
        <a href="add_product.php" class="btn btn-primary btn-lg me-3 animate__animated animate__zoomIn">➕ Add Product</a>
        <a href="view_products.php" class="btn btn-success btn-lg animate__animated animate__zoomIn">📦 View Products</a>
    </div>
</div>

<!-- Features Section -->
<div class="container mt-5">
    <div class="row text-center">
        <div class="col-md-4">
            <div class="card shadow-sm animate__animated animate__fadeInLeft">
                <div class="card-body">
                    <h5 class="card-title">📋 Easy Product Management</h5>
                    <p class="card-text">Add, view, and manage your products with just a few clicks.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm animate__animated animate__fadeInUp">
                <div class="card-body">
                    <h5 class="card-title">📊 Real-Time Updates</h5>
                    <p class="card-text">Keep your inventory up-to-date with real-time changes.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm animate__animated animate__fadeInRight">
                <div class="card-body">
                    <h5 class="card-title">🔒 Secure System</h5>
                    <p class="card-text">Your data is safe and secure with our robust system.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="bg-primary text-white text-center py-3 mt-5">
    <p>&copy; 2025 Inventory System (Mayank & Manan). All Rights Reserved.</p>
</footer>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<!-- http://localhost/inventory_system/index.php -->
<!-- http://localhost/phpmyadmin/index.php -->