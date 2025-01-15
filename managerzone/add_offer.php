<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

require 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $offer_title = $_POST['offer_title'];
    $offer_description = $_POST['offer_description'];
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    move_uploaded_file($image_tmp, "uploads/$image");

    $query = "INSERT INTO offers (title, description, image) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);
    if ($stmt->execute([$offer_title, $offer_description, $image])) {
        echo "<script>alert('Offer added successfully!'); window.location.href='view_offers.php';</script>";
    } else {
        echo "<script>alert('Error adding offer.');</script>";
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" integrity="" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" integrity="" crossorigin="anonymous" />
    <link rel="stylesheet" href="dist/css/adminlte.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="" crossorigin="anonymous" />
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <div class="app-wrapper">
        <?php include 'includes/header.php' ?>
        <?php include 'includes/sidebar.php' ?>
        <main class="app-main">
            <div class="col-md-8">
                <div class="card card-primary card-outline mb-4">
                    <div class="card-header">
                        <div class="card-title">Add New Offer</div>
                        <a href="view_offers.php"><button type="button" class="btn btn-primary float-end">View Offers</button></a>
                    </div>
                    <form method="POST" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="offer_title" class="form-label">Offer Title</label>
                                <input type="text" class="form-control" id="offer_title" name="offer_title" required>
                            </div>
                            <div class="mb-3">
                                <label for="offer_description" class="form-label">Description</label>
                                <textarea class="form-control" id="offer_description" name="offer_description" rows="3" required></textarea>
                            </div>
                            <label for="imageUpload" class="form-label">Upload Offer Picture</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputGroupFile02" name="image" required>
                                <label class="input-group-text" for="inputGroupFile02">Upload</label>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </main>
        <?php include 'includes/footer.php' ?>
    </div>
</body>
</html>