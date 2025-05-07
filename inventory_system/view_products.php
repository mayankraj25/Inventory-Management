<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
include 'db.php';

// Handle search and filter
$search = isset($_GET['search']) ? $_GET['search'] : '';
$filterCategory = isset($_GET['category']) ? $_GET['category'] : '';

// Build the query
$sql = "SELECT * FROM products WHERE name LIKE '%$search%'";
if ($filterCategory) {
    $sql .= " AND category = '$filterCategory'";
}
$result = $conn->query($sql);

// Fetch unique categories for the filter dropdown
$categories = $conn->query("SELECT DISTINCT category FROM products");
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Products</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
</head>
<body>
<div class="navbar">
    <a href="index.php">🏠 Home</a>
    <a href="add_product.php">➕ Add Product</a>
    <a href="logout.php">🚪 Logout</a>
</div>
<div class="container">
    <h2 class="animate__animated animate__fadeInDown">Product Inventory</h2>

    <!-- Search and Filter Form -->
    <form method="get" class="mb-4 animate__animated animate__fadeIn">
        <div class="row">
            <div class="col-md-6">
                <input type="text" name="search" class="form-control" placeholder="Search by product name..." value="<?= htmlspecialchars($search) ?>">
            </div>
            <div class="col-md-4">
                <select name="category" class="form-control">
                    <option value="">Filter by category</option>
                    <?php while ($row = $categories->fetch_assoc()): ?>
                        <option value="<?= $row['category'] ?>" <?= $filterCategory == $row['category'] ? 'selected' : '' ?>>
                            <?= $row['category'] ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary w-100">Search</button>
            </div>
        </div>
    </form>

    <!-- Products Table -->
    <table class="animate__animated animate__fadeIn">
        <tr>
            <th>ID</th><th>Name</th><th>Category</th><th>Supplier</th>
            <th>Quantity</th><th>Price</th><th>Action</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr class="animate__animated animate__fadeInUp">
                <td><?= $row['id'] ?></td>
                <td><?= $row['name'] ?></td>
                <td><?= $row['category'] ?></td>
                <td><?= $row['supplier'] ?></td>
                <td><?= $row['quantity'] ?></td>
                <td>$<?= $row['price'] ?></td>
                <td>
                    <a href="view_products.php?id=<?= $row['id'] ?>" class="btn danger animate__animated animate__zoomIn" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="7" class="text-center">No products found.</td>
            </tr>
        <?php endif; ?>
    </table>
</div>
</body>
</html>