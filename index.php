<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Delphine Company Ltd</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <!-- Meta Tags for SEO -->
    <meta name="description" content="Delphine Company Ltd - Leading supplier of fittings, pipes, plumbing, sanitary wares, and sewage systems wares.">

    <!-- Open Graph Meta Tags for Social Media -->
    <meta property="og:title" content="Delphine Company Ltd">
    <meta property="og:description" content="Leading supplier of fittings, pipes, plumbing, sanitary wares, and sewage systems wares.">
    <meta property="og:image" content="https://www.delphinecompany.co.tz/img/logo.png">
    <meta property="og:url" content="https://www.delphinecompany.co.tz">
    <meta property="og:type" content="website">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Delphine Company Ltd">
    <meta name="twitter:description" content="Leading supplier of fittings, pipes, plumbing, sanitary wares, and sewage systems wares.">
    <meta name="twitter:image" content="https://www.delphinecompany.co.tz/img/logo.png">

    <!-- Favicon -->
    <link rel="icon" href="https://www.delphinecompany.co.tz/img/favicon.png" type="image/png">
    <link rel="shortcut icon" href="https://www.delphinecompany.co.tz/img/favicon.png" type="image/png">

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


    <?php

    require 'managerzone/config/db.php';
// Fetch images for the slide1
$slide1_stmt = $pdo->query("SELECT * FROM slide1");
$slide1 = $slide1_stmt->fetchAll();
// Fetch images for slide2 
$slide2_stmt = $pdo->query("SELECT * FROM slide2");
$slide2 = $slide2_stmt->fetchAll();
?>
    
    <!-- Inline Styles -->
    <style>
        .owl-prev, 
        .owl-next {
            display: none !important;
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

<!-- Carousel Start -->
<div class="header-carousel owl-carousel" >
    <div class="header-carousel-item" >
        <img src="img/carousel-0.jpg" class="img-fluid w-100" alt="Image">
        <div class="carousel-caption">
            <div class="container">
                <div class="row gy-0 gx-5">
                    <div class="col-lg-0 col-xl-5"></div>
                    <div class="col-xl-7 animated fadeInLeft">
                        <div class="text-sm-center text-md-end">
                            <!-- <h4 class="text-primary text-uppercase fw-bold mb-5">DELPHINE COMPANY LTD</h4> -->
                            <h1 class="display-4 text-uppercase text-white mb-5">FITTINGS, PIPES, PLUMBING, SANITARY WARES & PVC</h1>
                            <p class="mb-5 fs-5">Efficient and reliable water systems, durable sanitary ware or versatile PVC materials,</p>
                            <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-2">
                                <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Watch Video</a>
                                <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="products.php">See More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-carousel-item" >
        <img src="img/carousel-1.jpg" class="img-fluid w-100" alt="Image">
        <div class="carousel-caption">
            <div class="container">
                <div class="row gy-0 gx-5">
                    <div class="col-lg-0 col-xl-5"></div>
                    <div class="col-xl-7 animated fadeInLeft">
                        <div class="text-sm-center text-md-end">
                            <!-- <h4 class="text-primary text-uppercase fw-bold mb-5">DELPHINE COMPANY LTD</h4> -->
                            <h1 class="display-4 text-uppercase text-white mb-5">Supplying Quality Plumbing Materials</h1>
                            <p class="mb-5 fs-5">Plumbing materials for clean and Sewage systems to ensure efficient water solutions.</p>
                            <div class="d-flex justify-content-center justify-content-md-end flex-shrink-0 mb-2">
                                <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Watch Video</a>
                                <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="products.php">See More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-carousel-item">
        <img src="img/carousel-2.jpg" class="img-fluid w-100" alt="Image">
        <div class="carousel-caption">
            <div class="container">
                <div class="row g-5">
                    <div class="col-12 animated fadeInUp">
                        <div class="text-center">
                            <!-- <h4 class="text-primary text-uppercase fw-bold mb-5">Delphine Company</h4> -->
                            <h1 class="display-4 text-uppercase text-white mb-5">Wasambazaji wa Vifaa vya Miundo Mbinu ya Maji</h1>
                            <p class="mb-5 fs-5">Tunatoa vifaa bora vya mfumo wa maji taka na maji safi kwa miradi yako yote.</p>
                            <div class="d-flex justify-content-center flex-shrink-0 mb-4">
                                <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="https://www.instagram.com/lesso_africa_mikocheni?utm_source=qr&igsh=MWQydXhqbzhhcjI3eA=="><i class="fas fa-play-circle me-2"></i> Watch Video</a>
                                <a class="btn btn-primary rounded-pill py-3 px-4 px-md-5 ms-2" href="products.php">Soma Zaidi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Carousel End -->
</div>

<!-- Navbar & Hero End -->


<!-- About Start -->
<div class="">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="text-primary">About Our Brands</h2>
            <p>We offer a wide range of high-quality products from leading brands to ensure efficient and reliable systems for your projects.</p>
        </div>
        <div class="row g-5 align-items-center">
            <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="owl-carousel owl-theme">
                    <?php foreach ($slide1 as $image): ?>
                    <div class="item">
                        <div class="bg-primary rounded position-relative overflow-hidden">
                            <img src="managerzone/<?php echo $image['image_path']; ?>" class="img-fluid rounded w-100" alt="" style="height: 400px; object-fit: cover;">
                            <div class="position-absolute bottom-0 start-0 p-4">
                                <h4 class="text-white"><?php echo $image['title']; ?></h4>
                                <p class="text-white"><?php echo $image['description']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-3">
                    <p>Explore our extensive range of plumbing hardware designed for both residential and commercial projects. <a href="products.php" class="text-primary"><i class="fas fa-link"></i> View Products</a></p>
                </div>
            </div>
            <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                <div class="owl-carousel owl-theme">
                    <?php foreach ($slide2 as $image2): ?>
                    <div class="item">
                        <div class="bg-primary rounded position-relative overflow-hidden">
                            <img src="managerzone/<?php echo $image2['image_path']; ?>" class="img-fluid rounded w-100" alt="" style="height: 400px; object-fit: cover;">
                            <div class="position-absolute bottom-0 start-0 p-4">
                                <h4 class="text-white"><?php echo $image2['title']; ?></h4>
                                <p class="text-white"><?php echo $image2['description']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
                <div class="mt-3">
                    <p>Discover our premium sanitary ware products that ensure hygiene and durability. <a href="products.php" class="text-primary"><i class="fas fa-link"></i> View Products</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About End -->

    <!-- Services Start -->
    <div class="container-fluid service pb-5">
        <div class="container pb-5">
            <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                <h4 class="text-primary">Our Services</h4>
                <h1 class="display-5 mb-4">We Provide the Best Services</h1>
                <p class="mb-0">We specialize in the supply of Plumbing hardware, sanitary ware, and electrical fittings. Our products ensure efficient water and electrical systems for your projects.</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/service-11.jpg" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom p-4">
                            <a href="#" class="h4 d-inline-block mb-4">Plumbing Hardware</a>
                            <p class="mb-4">We supply a wide range of plumbing hardware for both clean and waste water systems.</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="products.php">See More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/service-22.jpg" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom p-4">
                            <a href="#" class="h4 d-inline-block mb-4">Sanitary Ware</a>
                            <p class="mb-4">We offer a variety of sanitary ware products to ensure clean and efficient water systems.</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="products.php">See More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/service-33.jpg" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom p-4">
                            <a href="#" class="h4 d-inline-block mb-4">Electrical Fittings</a>
                            <p class="mb-4">We provide conduit pipes and fittings for efficient electrical systems.</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="products.php">See More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/service-1.jpg" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom p-4">
                            <a href="#" class="h4 d-inline-block mb-4">Plumbing Hardware</a>
                            <p class="mb-4">We supply a wide range of plumbing hardware for both clean and waste water systems.</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="products.php">See More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.4s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/service-2.jpg" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom p-4">
                            <a href="#" class="h4 d-inline-block mb-4">Sanitary Ware</a>
                            <p class="mb-4">We offer a variety of sanitary ware products to ensure clean and efficient water systems.</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="products.php">See More</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 wow fadeInUp" data-wow-delay="0.6s">
                    <div class="service-item">
                        <div class="service-img">
                            <img src="img/service-3.jpg" class="img-fluid rounded-top w-100" alt="Image">
                        </div>
                        <div class="rounded-bottom p-4">
                            <a href="#" class="h4 d-inline-block mb-4">Electrical Fittings</a>
                            <p class="mb-4">We provide conduit pipes and fittings for efficient electrical systems.</p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="products.php">See More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->

    
<!-- Brands Start -->
<div class="container-fluid blog py-5">
    <div class="container py-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Brands</h4>
            <h1 class="display-5 mb-4">Trusted Brands We Work With</h1>
            <p class="mb-0">
                At Delphine Company Ltd., we are proud to represent and distribute products from some of the most trusted brands 
                in the construction and plumbing industry. These brands ensure our clients receive reliable, high-quality materials for their projects.
            </p>
        </div>
        <div class="owl-carousel blog-carousel wow fadeInUp" data-wow-delay="0.2s">
            <div class="blog-item p-4">
                <div class="blog-img mb-4">
                    <img src="img/brands/lesso.png" class="img-fluid w-100 rounded" alt="LESSO">
                </div>
                <a href="#" class="h4 d-inline-block mb-3">LESSO</a>
                <p class="mb-4">
                    A global leader in plumbing and construction materials, LESSO ensures premium quality and innovation.
                </p>
            </div>
            <div class="blog-item p-4">
                <div class="blog-img mb-4">
                <img src="img/brands/ty.jpg" class="img-fluid w-100 rounded" alt="TY">
                </div>
                <a href="#" class="h4 d-inline-block mb-3">TY</a>
                <p class="mb-4">
                    TY offers durable and cost-effective solutions for plumbing, electrical, and general construction projects.
                </p>
            </div>
            <div class="blog-item p-4">
                <div class="blog-img mb-4">
                    <img src="img/brands/sawa.png" class="img-fluid w-100 rounded" alt="SAWA">
                </div>
                <a href="#" class="h4 d-inline-block mb-3">SAWA</a>
                <p class="mb-4">
                    Known for innovative and reliable products, 
            </div>
            <div class="blog-item p-4">
                <div class="blog-img mb-4">
                <img src="img/brands/arrow.png"  class="img-fluid w-100 rounded" alt="ARROW">
                </div>
                <a href="#" class="h4 d-inline-block mb-3">ARROW</a>
                <p class="mb-4">
                    ARROW specializes in premium construction tools and supplies.
            </div>
        </div>
    </div>
</div>
<!-- Brands End -->


<!-- Team Start -->
<div class="container-fluid team pb-5">
    <div class="container pb-5">
        <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
            <h4 class="text-primary">Our Team</h4>
            <h1 class="display-5 mb-4">Meet Our Team</h1>
            <p class="mb-0">Our team is composed of skilled professionals who are dedicated to providing top-notch services and solutions in the construction industry. With years of experience and expertise, they ensure that Delphine Company Ltd is always on the cutting edge of the construction supply business.</p>
        </div>
        <div class="row g-4">
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                <div class="team-item">
                    <div class="team-img">
                        <img src="img/mtasingwa.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="team-title">
                        <h4 class="mb-0">Deodatus Mtasingwa</h4>
                        <p class="mb-0">Chief Executive Officer (CEO)</p>
                    </div>
                    <div class="team-icon">
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="https://www.instagram.com/lesso_africa_mikocheni?utm_source=qr&igsh=MWQydXhqbzhhcjI3eA=="><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="https://www.instagram.com/lesso_africa_mikocheni?utm_source=qr&igsh=MWQydXhqbzhhcjI3eA=="><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href="https://www.instagram.com/lesso_africa_mikocheni?utm_source=qr&igsh=MWQydXhqbzhhcjI3eA=="><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-0" href="https://www.instagram.com/lesso_africa_mikocheni?utm_source=qr&igsh=MWQydXhqbzhhcjI3eA=="><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                <div class="team-item">
                    <div class="team-img">
                        <img src="img/saidi.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="team-title">
                        <h4 class="mb-0">Said Mshana</h4>
                        <p class="mb-0">General Manager</p>
                    </div>
                    <div class="team-icon">
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                <div class="team-item">
                    <div class="team-img">
                        <img src="img/gabone.png" class="img-fluid" alt="">
                    </div>
                    <div class="team-title">
                        <h4 class="mb-0">Amos Gabone</h4>
                        <p class="mb-0">Assistant Manager</p>
                    </div>
                    <div class="team-icon">
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                <div class="team-item">
                    <div class="team-img">
                        <img src="img/lucy.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="team-title">
                        <h4 class="mb-0">Lucy Lekule</h4>
                        <p class="mb-0">Sales Director</p>
                    </div>
                    <div class="team-icon">
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="1.0s">
                <div class="team-item">
                    <div class="team-img">
                        <img src="img/madaraka.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="team-title">
                        <h4 class="mb-0">Audax Madaraka</h4>
                        <p class="mb-0">Sales Manager</p>
                    </div>
                    <div class="team-icon">
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-3" href=""><i class="fab fa-linkedin-in"></i></a>
                        <a class="btn btn-primary btn-sm-square rounded-circle me-0" href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Team End -->

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

<!-- Initialize Owl Carousel -->
<script>
    $(document).ready(function(){
        $(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            autoplay: true,
            autoplayTimeout: 3000,
            autoplayHoverPause: true,
            nav: true,
            dots: true
        });
    });
</script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>
</html>