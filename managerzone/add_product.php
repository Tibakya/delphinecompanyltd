<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

// Database connection (adjust with your DB credentials)
require 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize user input
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_description = mysqli_real_escape_string($conn, $_POST['product_description']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
    $product_category = mysqli_real_escape_string($conn, $_POST['product_category']);
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_tmp, "uploads/$image");

    // Insert product into the database
    $query = "INSERT INTO products (name, description, price, category) VALUES ('$product_name', '$product_description', '$product_price', '$product_category, '$image'')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Product added successfully!');</script>";
    } else {
        echo "<script>alert('Error adding product.');</script>";
    }
}

?>

<!doctype html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Delphine Company </title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content=" " />
    <meta name="author" content="" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <!--end::Primary Meta Tags-->
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css"
        integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />
    <!--end::Fonts-->
    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css"
        integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->
    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"
        integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->
    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="dist/css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->
    <!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
        integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous" />
</head>

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">

        <?php include 'includes/header.php' ?>

        <?php include 'includes/sidebar.php' ?>
        

            <main class="app-main">
            
                <div class="col-md-8">
                   
                    <div class="card card-primary card-outline mb-4">
                        <div class="card-header">
                            <div class="card-title">Add New Product</div>
                            
                        <a href="view_products.php" ><button type="button" class="btn btn-primary float-end">View Products</button></a> 
                    
                        </div>
                        
                        <form method="POST">
                            <div class="card-body">
                            
                                <div class="mb-3">
                                    <label for="product_name" class="form-label">Product Name</label>
                                    <input type="text" class="form-control" id="product_name" name="product_name"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="product_category" class="form-label">Category</label>
                                    <input type="text" class="form-control" id="product_category"
                                        name="product_category" required>
                                </div>
                                <div class="mb-3">
                                    <label for="product_description" class="form-label">Description</label>
                                    <textarea class="form-control" id="product_description" name="product_description"
                                        rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="product_price" class="form-label">Price</label>
                                    <input type="number" class="form-control" id="product_price" name="product_price"
                                        required>
                                </div>
                                <label for="imageUpload" class="form-label">Upload Product Picture</label>

                                <div class="input-group mb-3">
                                    <input type="file" class="form-control" id="inputGroupFile02" />
                                    <label class="input-group-text" for="inputGroupFile02">Upload</label>
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
        </div>
    </div>

    <?php include 'includes/footer.php' ?>
</body>

</html>