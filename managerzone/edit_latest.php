<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

require 'config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the entry from both tables (slide1 and slide2)
    $stmt = $pdo->prepare("
        SELECT * FROM slide1 WHERE id = :id
        UNION
        SELECT * FROM slide2 WHERE id = :id
    ");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $entry = $stmt->fetch();

    if (!$entry) {
        header("Location: latest.php");
        exit();
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle form submission to update the entry
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image_path = $_POST['image_path']; // In case the image is updated

    // Update the entry in both tables (slide1 and slide2)
    $update_stmt1 = $pdo->prepare("
        UPDATE slide1 
        SET title = :title, description = :description, image_path = :image_path 
        WHERE id = :id
    ");
    $update_stmt1->bindParam(':title', $title);
    $update_stmt1->bindParam(':description', $description);
    $update_stmt1->bindParam(':image_path', $image_path);
    $update_stmt1->bindParam(':id', $id);
    $update_stmt1->execute();

    $update_stmt2 = $pdo->prepare("
        UPDATE slide2 
        SET title = :title, description = :description, image_path = :image_path 
        WHERE id = :id
    ");
    $update_stmt2->bindParam(':title', $title);
    $update_stmt2->bindParam(':description', $description);
    $update_stmt2->bindParam(':image_path', $image_path);
    $update_stmt2->bindParam(':id', $id);
    $update_stmt2->execute();

    // Redirect to the page with the latest entries after the update
    header("Location: latest.php");
    exit();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Latest Entry</title>

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
                <h1 class="mb-4">Edit Latest Entry</h1>

                <form method="POST" action="edit_latest.php?id=<?php echo $entry['id']; ?>" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title:</label>
                        <input type="text" class="form-control" name="title" id="title" value="<?php echo htmlspecialchars($entry['title']); ?>" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description:</label>
                        <textarea class="form-control" name="description" id="description" required><?php echo htmlspecialchars($entry['description']); ?></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image_path" class="form-label">Image:</label>
                        <input type="file" class="form-control" name="image_path" id="image_path">
                        <img src="<?php echo htmlspecialchars($entry['image_path']); ?>" alt="Current Image" class="img-thumbnail mt-2" style="width: 150px;">
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                    <a href="latest.php" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </main>

        <?php include 'includes/footer.php'; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
