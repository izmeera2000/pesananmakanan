<?php
session_start();
require_once("assets/controller/dbcontroller.php");
$db_handle = new DBController();

if (isset($_POST['rgt'])) {

  $username = $db_handle->escstring($_POST['username']);
  $name = $db_handle->escstring($_POST['name']);
  $password_1 = $db_handle->escstring($_POST['password_1']);
  $password_2 = $db_handle->escstring($_POST['password_2']);


  if ($password_1 != $password_2) {
    array_push($errors, "The two passwords do not match");
  }

  $checkexists = $db_handle->runQuery("SELECT * FROM users WHERE username='$username'  ");
  if (!empty($checkexists)) {
    array_push($errors, "Username already exists");

  }

  if (count($errors) == 0) {
    $password = md5($password_1); //encrypt the password before saving in the database



   $db_handle->uploadFOrder("INSERT INTO users (username,name,password) VALUES ('$username','$name','$password') ");

    $_SESSION['username'] = $username;
    header('location: adminpo.php');
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

      <a class="logo d-flex align-items-center me-auto me-lg-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1>Taiping Yong Tau Foo</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>

          <li><a href="adminrgt.php#events">Register</a></li>
          <li><a href="adminlgn.php">Login</a></li>

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

        <div class="mt-4 section-header ">
          <h3>Register</h2>
        </div>

        <div class="row g-0">


          <div class="col-lg-8 d-flex align-items-center reservation-form-bg">
            <form action="adminrgt.php" method="post" class="php-email-form" data-aos="fade-up"
              data-aos-delay="100">

              <div class="row gy-4">
                <?php include('errors.php'); ?>
                <div class="col-lg-12 col-md-12">
                  <input type="text" name="username" class="form-control"  placeholder="Username" required>
                </div>
                <div class="col-lg-12 col-md-12">
                  <input type="text" name="name" class="form-control"  placeholder="Name" required>
                </div>
                <div class="col-lg-12 col-md-12">
                  <input type="password" name="password_1" class="form-control"  placeholder="Password" required>
                </div>
                <div class="col-lg-12 col-md-12">
                  <input type="password" name="password_2" class="form-control" 
                    placeholder="Confirm Password" required>
                </div>
              </div>

              <div class="mb-3">
              </div>
              <div class="text-center"><button type="submit" name="rgt">Register</button></div>
            </form>
          </div><!-- End Reservation Form -->

        </div>

      </div>
    </section><!-- End Book A Table Section -->

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

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>