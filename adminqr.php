<?php
session_start();
require_once("assets/controller/dbcontroller.php");
include('assets/vendor/phpqrcode/qrlib.php');
$db_handle = new DBController();

if (!isset($_SESSION['username'])) {
    header('location: adminlgn.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: adminlgn.php");
}


if (!empty($_POST['tablen'])) {
    $_SESSION['qrtable'] = $_POST["tablen"];
} else {
    $_SESSION['qrtable'] = '';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Taiping Yong Tau Foo</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <meta name="theme-color" content="#db4938" />
    <link rel="manifest" href="manifest.json" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Yummy - v1.2.1
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <a  class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>Taiping Yong Tau Foo</h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>

                    <li><a>
                            <?php echo $_SESSION['username'] ?>
                        </a></li>
                    <li><a href="adminpo.php">Payment</a></li>
                    <li><a href="admino.php">Orders</a></li>
                    <li><a href="adming.php">Records</a></li>
                    <li><a href="adminqr.php#hero">QR Code</a></li>
                    <li> <a href="?logout='1'">Logout</a></li>

                </ul>
            </nav><!-- .navbar -->


            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->


    <main id="main">




            <!-- ======= Book A Table Section ======= -->
    <section id="book-a-table" class="book-a-table">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>QR Code</h2>
          <p>Sila masukkan <span>Nombor Meja</span></p>
        </div>

        <div class="row g-0">

        <div class="col-lg-12 mx-auto"  data-aos="zoom-out" data-aos-delay="200">
          <img src="adminqr-data.php" class="img-fluid mx-auto d-block"   onerror="this.onerror=null;this.src='assets/img/what.png';" >
                            
          </div>

            <form action="adminqr" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="100">
              <div class="row gy-4">
    
                <select class="my-4" name="tablen" id="tablen" data-aos="fade-up" data-aos-delay="100"
                                style="  padding: 12px 15px;
    border-radius: 0;
  box-shadow: none;
  font-size: 14px;
  border-radius: 0;" required>
                                <option value="">--- Pilih Meja ---</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>

                            </select>
              <div class="text-center"><button type="submit">Book a Table</button></div>
            </form>
        

        </div>

      </div>
    </section><!-- End Book A Table Section -->

        <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
                class="bi bi-arrow-up-short"></i></a>

        <div id="preloader"></div>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>


</body>

</html>