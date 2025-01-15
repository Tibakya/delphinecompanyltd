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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    
    <meta name="title" content=" " />
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" integrity="" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" integrity="" crossorigin="anonymous" />
    <link rel="stylesheet" href="dist/css/adminlte.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="" crossorigin="anonymous" />


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        <?php include 'includes/header.php'; ?>
        <?php include 'includes/sidebar.php'; ?>
        
        <main class="app-main">
            <div class="container mt-5">
                <h1 class="mb-4">Edit Product</h1>

                <form method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">

                    <div class="mb-3">
                        <label for="name" class="form-label">Product Name:</label>
                        <input type="text" class="form-control" name="name" value="<?php echo $product['name']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" name="description" required><?php echo $product['description']; ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="price" class="form-label">Price:</label>
                        <input type="number" class="form-control" name="price" value="<?php echo $product['price']; ?>" step="0.01" required>
                    </div>

                    <div class="mb-3">
                        <label for="category" class="form-label">Category:</label>
                        <input type="text" class="form-control" name="category" value="<?php echo $product['category']; ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image:</label>
                        <input type="file" class="form-control" name="image">
                        <?php if ($product['image']) { ?>
                            <img src="uploads/<?php echo $product['image']; ?>" alt="Current Image" class="img-thumbnail mt-2" style="width: 150px;">
                        <?php } ?>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary">Update Product</button>
                    <a href="view_products.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </main>

        <?php include 'includes/footer.php'; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
