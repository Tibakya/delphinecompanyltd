<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

require 'config/db.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    if (!empty($image)) {
        move_uploaded_file($image_tmp, "uploads/$image");
        $sql = "UPDATE products SET name=?, description=?, price=?, category=?, image=? WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $description, $price, $category, $image, $id]);
    } else {
        $sql = "UPDATE products SET name=?, description=?, price=?, category=? WHERE id=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$name, $description, $price, $category, $id]);
    }

    echo "<script>alert('Product updated successfully'); window.location.href='view_products.php';</script>";
} else {
    $id = $_GET['id'];
    $product = $pdo->query("SELECT * FROM products WHERE id='$id'")->fetch();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Product</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <label>Product Name:</label>
        <input type="text" name="name" value="<?php echo $product['name']; ?>" required><br>
        <label>Description:</label>
        <textarea name="description" required><?php echo $product['description']; ?></textarea><br>
        <label>Price:</label>
        <input type="number" name="price" value="<?php echo $product['price']; ?>" step="0.01" required><br>
        <label>Category:</label>
        <input type="text" name="category" value="<?php echo $product['category']; ?>" required><br>
        <label>Image:</label>
        <input type="file" name="image"><br>
        <button type="submit" name="submit">Update Product</button>
    </form>
</body>
</html>