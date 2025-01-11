<?php
require '../config/db.php';
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_FILES['image']['name'];

    move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image);

    $stmt = $pdo->prepare("INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $description, $price, $image]);
}

$products = $pdo->query("SELECT * FROM products")->fetchAll();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Products</title>
</head>
<body>
    <h2>Products</h2>
    <form method="POST" enctype="multipart/form-data">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Description:</label>
        <textarea name="description" required></textarea><br>
        <label>Price:</label>
        <input type="number" name="price" step="0.01" required><br>
        <label>Image:</label>
        <input type="file" name="image" required><br>
        <button type="submit">Add Product</button>
    </form>

    <h3>Existing Products</h3>
    <ul>
        <?php foreach ($products as $product): ?>
            <li><?php echo $product['name']; ?> - $<?php echo $product['price']; ?></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
