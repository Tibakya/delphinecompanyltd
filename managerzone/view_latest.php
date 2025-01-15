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

// Fetch images from slide1 table with pagination, ordered by ID descending
$latest_stmt1 = $pdo->prepare("SELECT * FROM slide1 ORDER BY id DESC LIMIT :limit OFFSET :offset");
$latest_stmt1->bindParam(':limit', $latest_per_page, PDO::PARAM_INT);
$latest_stmt1->bindParam(':offset', $latest_offset, PDO::PARAM_INT);
$latest_stmt1->execute();
$latest1 = $latest_stmt1->fetchAll();


// Fetch images from slide2 table with pagination, ordered by ID descending
$latest_stmt2 = $pdo->prepare("SELECT * FROM slide2 ORDER BY id DESC LIMIT :limit OFFSET :offset");
$latest_stmt2->bindParam(':limit', $latest_per_page, PDO::PARAM_INT);
$latest_stmt2->bindParam(':offset', $latest_offset, PDO::PARAM_INT);
$latest_stmt2->execute();
$latest2 = $latest_stmt2->fetchAll();

// Fetch total number of entries for both tables
$total_latest1 = $pdo->query("SELECT COUNT(*) FROM slide1")->fetchColumn();
$total_latest2 = $pdo->query("SELECT COUNT(*) FROM slide2")->fetchColumn();
$total_latest_pages = ceil(($total_latest1 + $total_latest2) / $latest_per_page);
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
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">
    <?php include 'includes/header.php'; ?>
    <?php include 'includes/sidebar.php'; ?>
    <main class="app-main">
        <div class="container">
            <h1 class="mt-5">Latest Entries</h1>
            <div class="row">
                <!-- Latest Entries from slide1 -->
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">About Images</h3>
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
                                        <?php if (count($latest1) > 0): ?>
                                            <?php foreach ($latest1 as $index => $entry): ?>
                                            <tr class="align-middle">
                                                <td><?php echo $index + 1 + $latest_offset; ?>.</td>
                                                <td>
                                                    <img src="<?php echo htmlspecialchars($entry['image_path']); ?>" 
                                                         alt="<?php echo htmlspecialchars($entry['title']); ?>" 
                                                         class="img-thumbnail" 
                                                         style="width: 50px;">
                                                </td>
                                                <td><?php echo htmlspecialchars($entry['title']); ?></td>
                                                <td><?php echo htmlspecialchars($entry['description']); ?></td>
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
                                                <td colspan="5" class="text-center">No entries available.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Latest Entries from slide2 -->
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            <h3 class="card-title">About2 Images</h3>
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
                                        <?php if (count($latest2) > 0): ?>
                                            <?php foreach ($latest2 as $index => $entry): ?>
                                            <tr class="align-middle">
                                                <td><?php echo $index + 1 + $latest_offset; ?>.</td>
                                                <td>
                                                    <img src="<?php echo htmlspecialchars($entry['image_path']); ?>" 
                                                         alt="<?php echo htmlspecialchars($entry['title']); ?>" 
                                                         class="img-thumbnail" 
                                                         style="width: 50px;">
                                                </td>
                                                <td><?php echo htmlspecialchars($entry['title']); ?></td>
                                                <td><?php echo htmlspecialchars($entry['description']); ?></td>
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
                                                <td colspan="5" class="text-center">No entries available.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-end">
                    <?php for ($i = 1; $i <= $total_latest_pages; $i++): ?>
                        <li class="page-item <?php if ($i == $latest_page) echo 'active'; ?>">
                            <a class="page-link" href="?latest_page=<?php echo $i; ?>"><?php echo $i; ?></a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
    </main>
    <?php include 'includes/footer.php'; ?>
</div>
</body>
</html>
