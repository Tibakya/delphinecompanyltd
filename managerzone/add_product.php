<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

require 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_category = $_POST['product_category'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_tmp, "uploads/$image");

    $query = "INSERT INTO products (name, description, price, category, image) VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    if ($stmt->execute([$product_name, $product_description, $product_price, $product_category, $image])) {
        echo "<script>alert('Product added successfully!'); window.location.href='view_products.php';</script>";
    } else {
        echo "<script>alert('Error adding product.');</script>";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Delphine Company</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content=" " />
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
    <link rel="stylesheet" href="dist/css/adminlte.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous" />
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        <?php include 'includes/header.php' ?>
        <?php include 'includes/sidebar.php' ?>
        <main class="app-main">
            <div class="container">
                <h1 class="mt-5">Add New Product</h1>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">Add New Product</h3>
                                <a href="view_products.php"><button type="button" class="btn btn-secondary float-end">View Products</button></a>
                            </div>
                            <div class="card-body">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label for="product_name" class="form-label">Product Name</label>
                                        <input type="text" class="form-control" id="product_name" name="product_name" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_category" class="form-label">Category</label>
                                        <input type="text" class="form-control" id="product_category" name="product_category" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_description" class="form-label">Description</label>
                                        <textarea class="form-control" id="product_description" name="product_description" rows="3" required></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="product_price" class="form-label">Price</label>
                                        <input type="number" class="form-control" id="product_price" name="product_price" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="image" class="form-label">Upload Product Picture</label>
                                        <input type="file" class="form-control" id="image" name="image" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
        <?php include 'includes/footer.php' ?>
    </div>
</body>
</html>