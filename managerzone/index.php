<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

require 'config/db.php';

// Pagination settings
$products_per_page = 10;
$offers_per_page = 10;

// Get current page number for products
$product_page = isset($_GET['product_page']) ? (int)$_GET['product_page'] : 1;
$product_offset = ($product_page - 1) * $products_per_page;

// Get current page number for offers
$offer_page = isset($_GET['offer_page']) ? (int)$_GET['offer_page'] : 1;
$offer_offset = ($offer_page - 1) * $offers_per_page;

// Fetch products with pagination
$product_stmt = $pdo->prepare("SELECT * FROM products LIMIT :limit OFFSET :offset");
$product_stmt->bindParam(':limit', $products_per_page, PDO::PARAM_INT);
$product_stmt->bindParam(':offset', $product_offset, PDO::PARAM_INT);
$product_stmt->execute();
$products = $product_stmt->fetchAll();

// Fetch total number of products
$total_products = $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn();
$total_product_pages = ceil($total_products / $products_per_page);

// Fetch offers with pagination
$offer_stmt = $pdo->prepare("SELECT * FROM offers LIMIT :limit OFFSET :offset");
$offer_stmt->bindParam(':limit', $offers_per_page, PDO::PARAM_INT);
$offer_stmt->bindParam(':offset', $offer_offset, PDO::PARAM_INT);
$offer_stmt->execute();
$offers = $offer_stmt->fetchAll();

// Fetch total number of offers
$total_offers = $pdo->query("SELECT COUNT(*) FROM offers")->fetchColumn();
$total_offer_pages = ceil($total_offers / $offers_per_page);
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
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6"><h3 class="mb-0">Dashboard</h3></div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-end">
                                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="app-content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-primary shadow-sm">
                                    <i class="bi bi-gear-fill"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Products</span>
                                    <span class="info-box-number">
                                        <?php echo $total_products; ?>
                                        <small>Items</small>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-danger shadow-sm">
                                    <i class="bi bi-hand-thumbs-up-fill"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Offers</span>
                                    <span class="info-box-number"><?php echo $total_offers; ?></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-success shadow-sm">
                                    <i class="bi bi-cart-fill"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Orders</span>
                                    <span class="info-box-number">760</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon text-bg-success shadow-sm">
                                    <i class="bi bi-cart-fill"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Today's Viewers</span>
                                    <span class="info-box-number">760</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header"><h3 class="card-title">Products</h3></div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Image</th>
                                                    <th>Product Name</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (count($products) > 0): ?>
                                                    <?php foreach ($products as $index => $product): ?>
                                                    <tr class="align-middle">
                                                        <td><?php echo $index + 1 + $product_offset; ?>.</td>
                                                        <td><img src="uploads/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="img-thumbnail" style="width: 50px;"></td>
                                                        <td><?php echo $product['name']; ?></td>
                                                        <td><?php echo $product['category']; ?></td>
                                                        <td><?php echo $product['price']; ?></td>
                                                        <td>
                                                            <a href="edit_product.php?id=<?php echo $product['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                            <form method="POST" action="delete_product.php" style="display:inline;">
                                                                <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                                                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="6" class="text-center">No products available.</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-end">
                                        <?php for ($i = 1; $i <= $total_product_pages; $i++): ?>
                                            <li class="page-item <?php if ($i == $product_page) echo 'active'; ?>"><a class="page-link" href="?product_page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                        <?php endfor; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card mb-4">
                                <div class="card-header"><h3 class="card-title">Offers</h3></div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th style="width: 10px">#</th>
                                                    <th>Image</th>
                                                    <th>Offer Title</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (count($offers) > 0): ?>
                                                    <?php foreach ($offers as $index => $offer): ?>
                                                    <tr class="align-middle">
                                                        <td><?php echo $index + 1 + $offer_offset; ?>.</td>
                                                        <td><img src="uploads/<?php echo $offer['image']; ?>" alt="<?php echo $offer['title']; ?>" class="img-thumbnail" style="width: 50px;"></td>
                                                        <td><?php echo $offer['title']; ?></td>
                                                        <td><?php echo $offer['description']; ?></td>
                                                        <td>
                                                            <a href="edit_offer.php?id=<?php echo $offer['id']; ?>" class="btn btn-primary btn-sm">Edit</a>
                                                            <form method="POST" action="delete_offer.php" style="display:inline;">
                                                                <input type="hidden" name="id" value="<?php echo $offer['id']; ?>">
                                                                <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="5" class="text-center">No offers available.</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer clearfix">
                                    <ul class="pagination pagination-sm m-0 float-end">
                                        <?php for ($i = 1; $i <= $total_offer_pages; $i++): ?>
                                            <li class="page-item <?php if ($i == $offer_page) echo 'active'; ?>"><a class="page-link" href="?offer_page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                                        <?php endfor; ?>
                                    </ul>
                                </div>
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