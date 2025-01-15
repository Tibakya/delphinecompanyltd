<?php
// Include the database connection (PDO)
require_once 'managerzone/config/db.php';

// Fetch products from the database using PDO
$sql = "SELECT * FROM products ORDER BY id DESC LIMIT 10"; 
$stmt = $pdo->query($sql);  // Execute the query and assign the result
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Our Products - Delphine Company Ltd</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <!-- Meta Tags for SEO -->
    <meta name="description" content="Delphine Company Ltd - Leading supplier of fittings, pipes, plumbing, sanitary wares, and sewage systems wares.">

    <!-- Open Graph Meta Tags for Social Media -->
    <meta property="og:title" content="Delphine Company Ltd">
    <meta property="og:description" content="Leading supplier of fittings, pipes, plumbing, sanitary wares, and sewage systems wares.">
    <meta property="og:image" content="https://www.delphinecompanyltd.co.tz/img/logo.png">
    <meta property="og:url" content="https://www.delphinecompanyltd.co.tz">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Delphine Company Ltd">
    <meta name="twitter:description" content="Leading supplier of fittings, pipes, plumbing, sanitary wares, and sewage systems wares.">
    <meta name="twitter:image" content="https://www.delphinecompanyltd.co.tz/img/logo.png">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="lib/animate/animate.min.css" />
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <!-- Custom CSS for Image Styling -->
    <style>
        /* Style for images */
        #product-image {
            width: 100%;
            height: 300px; /* Adjust the height as needed */
            object-fit: cover; /* This ensures the image fills the space without distorting */
        }
    </style>
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <!-- Topbar Start -->
    <?php include 'include/topbar.php'; ?>
    <!-- Topbar End -->

    <!-- Navbar & Hero Start -->
    <?php include 'include/navbar.php'; ?>
    <!-- Navbar & Hero End -->

    <!-- Header Start -->
    <div class="container-fluid bg-breadcrumb">
        <div class="container text-center py-5" style="max-width: 900px;">
            <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Our Products & Services</h4>
            <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item"><a href="#">More</a></li>
                <li class="breadcrumb-item active text-primary">Products</li>
            </ol>
        </div>
    </div>
    <!-- Header End -->

    <!-- Services Start -->
    <div class="container-fluid service py-5">
        <div class="container py-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Products</h4>
                <h1 class="display-5 mb-4">Products Tailored to Your Needs</h1>
                <p class="mb-0">We provide a range of top-quality products and services designed to meet the unique requirements of our clients. Our commitment is to deliver excellence, affordability, and innovation in every project we undertake.</p>
            </div>
            <div class="row g-4">

                <?php
                // Check if there are any products
                if ($stmt->rowCount() > 0) {
                    // Output each product
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">';
                        echo '<div class="service-item">';
                        echo '<div class="service-img">';
                        echo '<img id="product-image" src="managerzone/uploads/' . $row["image"] . '" class="img-fluid rounded-top" alt="' . $row["name"] . '">';
                        echo '</div>';
                        echo '<div class="rounded-bottom p-4">';
                        echo '<a href="#" class="h4 d-inline-block mb-4">' . $row["name"] . '</a>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo '<p>No products available</p>';
                }
                ?>

            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- Testimonial Start -->
    <?php include 'include/testimonies.php'; ?>
    <!-- Testimonial End -->

    <!-- Footer Start -->
    <?php include 'include/footer.php'; ?>
    <!-- Footer End -->

    <!-- Copyright Start -->
    <?php include 'include/copyright.php'; ?>
    <!-- Copyright End -->

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>