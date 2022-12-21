<?php
session_start();
require_once("assets/controller/dbcontroller.php");
$db_handle = new DBController();

if (!isset($_SESSION['username'])){
    header('location: adminlgn.php');
}
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: adminlgn.php");
}

if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "paid":

            $productByCode = $db_handle->updateState("UPDATE pesanan SET foodstate='0' WHERE ref='" . $_GET["ref"] . "'");
            break;
        case "cancel":

            $productByCode = $db_handle->updateState("UPDATE pesanan SET foodstate='2' WHERE ref='" . $_GET["ref"] . "'");
            break;
    }
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

            <a href="index.html" class="logo d-flex align-items-center me-auto me-lg-0">
                <!-- Uncomment the line below if you also wish to use an image logo -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1>Taiping Yong Tau Foo</h1>
            </a>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a ><?php echo $_SESSION['username'] ?></a></li>
                    <li><a href="adminpo.php#events">Payment</a></li>
                    <li><a href="admino.php">Orders</a></li>
                    <li><a href="adming.php">Records</a></li>
                    <li><a href="adminqr.php">QR Code</a></li>

                    <li> <a href="?logout='1'">Logout</a></li>

                </ul>
            </nav><!-- .navbar -->


            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->


    <main id="main">



        <!-- ======= Events Section ======= -->
        <section id="events" class="events">
            <div class="container-fluid" data-aos="fade-up">

                <div class="section-header">
                    <h1></h1>

                    <h1>Payment Orders</h1>
                </div>

                <div class="slides-1 swiper" data-aos="fade-up" data-aos-delay="100">
                    <div class="swiper-wrapper" id="data4">


                      
                   



                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Events Section -->

    </main><!-- End #main -->



    <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

<script>
        function table() {
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function () {
        document.getElementById("data4").innerHTML = this.responseText;
        // if (document.getElementById("data").innerHTML != "") {
        // }




      }
      xhttp.open("GET", "adminpo-data.php");
      xhttp.send();
    }

    setInterval(function () {
      table();
    }, 1000);
</script>
</body>

</html>