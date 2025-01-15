<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

require 'config/db.php';

// Pagination settings
$latest_per_page = 10;
$latest_page = isset($_GET['latest_page']) ? (int)$_GET['latest_page'] : 1;
$latest_offset = ($latest_page - 1) * $latest_per_page;

// Fetch latest with pagination
$latest_stmt = $pdo->prepare("SELECT * FROM about_images LIMIT :limit OFFSET :offset");
$latest_stmt->bindParam(':limit', $latest_per_page, PDO::PARAM_INT);
$latest_stmt->bindParam(':offset', $latest_offset, PDO::PARAM_INT);
$latest_stmt->execute();
$latest = $latest_stmt->fetchAll();

// Fetch total number of latest
$total_latest = $pdo->query("SELECT COUNT(*) FROM about_images")->fetchColumn();
$total_latest_pages = ceil($total_latest / $latest_per_page);
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
            <h1 class="mt-5">Latest Entries</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">Latest</h3>
                            <a href="add_latest.php"><button type="button" class="btn btn-primary float-end">Add Latest</button></a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (count($latest) > 0): ?>
                                            <?php foreach ($latest as $index => $entry): ?>
                                            <tr class="align-middle">
                                                <td><?php echo $index + 1 + $latest_offset; ?>.</td>
                                                <td><img src="uploads/<?php echo $entry['image_path']; ?>" alt="<?php echo $entry['title']; ?>" class="img-thumbnail" style="width: 50px;"></td>
                                                <td><?php echo $entry['title']; ?></td>
                                                <td><?php echo $entry['description']; ?></td>
                                                <td>
                                                    <a href="edit_latest.php?id=<?php echo $entry['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                    <form method="POST" action="delete_latest.php" style="display:inline;">
                                                        <input type="hidden" name="id" value="<?php echo $entry['id']; ?>">
                                                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="5" class="text-center">No latest entries available.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-end">
                                <?php for ($i = 1; $i <= $total_latest_pages; $i++): ?>
                                    <li class="page-item <?php if ($i == $latest_page) echo 'active'; ?>"><a class="page-link" href="?latest_page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                <?php endfor; ?>
                            </ul>
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