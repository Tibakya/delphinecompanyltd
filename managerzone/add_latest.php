<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

require 'config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // For slide1 table
    $title1 = htmlspecialchars(trim($_POST['title1']));
    $description1 = htmlspecialchars(trim($_POST['description1']));
    $image_path1 = '';

    // For slide2 table
    $title2 = htmlspecialchars(trim($_POST['title2']));
    $description2 = htmlspecialchars(trim($_POST['description2']));
    $image_path2 = '';

    // Check if the 'slide1' folder exists, create it if not
    $upload_dir = 'slide1/';
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    // Handle image upload for the first table (slide1)
    if (isset($_FILES['image1']) && $_FILES['image1']['error'] == 0) {
        $image1_name = basename($_FILES['image1']['name']);
        $image_path1 = $upload_dir . $image1_name;

        // Validate file type and size (max 5GB)
        $allowed_types = ['image/jpeg', 'image/png', 'image/gif'];
        $max_file_size = 5 * 1024 * 1024 * 1024; // 5GB

        if (in_array($_FILES['image1']['type'], $allowed_types) && $_FILES['image1']['size'] <= $max_file_size) {
            if (!move_uploaded_file($_FILES['image1']['tmp_name'], $image_path1)) {
                die("Failed to upload image 1. Please try again.");
            }
        } else {
            die("Invalid file type or size for image 1. Only JPEG, PNG, and GIF files under 5GB are allowed.");
        }
    }

    // Handle image upload for the second table (slide2)
    if (isset($_FILES['image2']) && $_FILES['image2']['error'] == 0) {
        $image2_name = basename($_FILES['image2']['name']);
        $image_path2 = $upload_dir . $image2_name;

        if (in_array($_FILES['image2']['type'], $allowed_types) && $_FILES['image2']['size'] <= $max_file_size) {
            if (!move_uploaded_file($_FILES['image2']['tmp_name'], $image_path2)) {
                die("Failed to upload image 2. Please try again.");
            }
        } else {
            die("Invalid file type or size for image 2. Only JPEG, PNG, and GIF files under 5GB are allowed.");
        }
    }

    // Insert data into the slide1 table
    $stmt1 = $pdo->prepare("INSERT INTO slide1 (title, description, image_path) VALUES (?, ?, ?)");
    $stmt1->execute([$title1, $description1, $image_path1]);

    // Insert data into the slide2 table
    $stmt2 = $pdo->prepare("INSERT INTO slide2 (title, description, image_path) VALUES (?, ?, ?)");
    $stmt2->execute([$title2, $description2, $image_path2]);

    header("Location: view_latest.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Delphine Company</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" />
    <link rel="stylesheet" href="dist/css/adminlte.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" />
    <style>
        /* Styling for all input groups */
        #input-group {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        #input-group .form-group {
            flex: 1;
        }

        /* Styling for individual form groups */
        #title1, #description1, #image1,
        #title2, #description2, #image2 {
            width: 100%;
        }

        /* Media query for small screens */
        @media (max-width: 768px) {
            #input-group .form-group {
                flex: 100%;
            }
        }
    </style>
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/sidebar.php'; ?>
    <main class="app-main">
        <div class="container">
            <h1 class="mt-5">Add Latest</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Add Latest</h3>
                            <a href="view_latest.php"><button type="button" class="btn btn-secondary float-end">View Latest</button></a>
                        </div>
                        <div class="card-body">
                            <form action="add_latest.php" method="post" enctype="multipart/form-data">
                                <!-- Grouped Fields for the first table (slide1) -->
                                <div id="input-group">
                                    <div class="form-group mb-3">
                                        <label for="title1" class="form-label">Title for Slide 1</label>
                                        <input type="text" class="form-control" id="title1" name="title1" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description1" class="form-label">Description for Slide 1</label>
                                        <textarea class="form-control" id="description1" name="description1" required></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="image1" class="form-label">Image for Slide 1</label>
                                        <input type="file" class="form-control" id="image1" name="image1" required>
                                    </div>
                                </div>

                                <!-- Grouped Fields for the second table (slide2) -->
                                <label class="btn btn-warning mb-4">Second Slide Images</label>
                                <div id="input-group">
                                    <div class="form-group mb-3">
                                        <label for="title2" class="form-label">Title for Slide 2</label>
                                        <input type="text" class="form-control" id="title2" name="title2" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description2" class="form-label">Description for Slide 2</label>
                                        <textarea class="form-control" id="description2" name="description2" required></textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="image2" class="form-label">Image for Slide 2</label>
                                        <input type="file" class="form-control" id="image2" name="image2" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
</div>
</body>
</html>
