<?php
session_start();
require_once("assets/controller/dbcontroller.php");
$db_handle = new DBController();

if (empty($_SESSION["tablen"])) {
  if (!empty($_GET["tablen"])) {
    $_SESSION["tablen"] = $_GET["tablen"];
  } else {
    header("Location:tablenum.php");
  }

}
else{
  if (!empty($_GET["tablen"])) {
    $_SESSION["tablen"] = $_GET["tablen"];
  } 
}



if (!empty($_SESSION["ref"])) {
  $ref = $_SESSION["ref"];
} else {
  $_SESSION["ref"] = uniqid();
}

if (!empty($_GET["action"])) {
  switch ($_GET["action"]) {
    case "add":

      $productByCode = $db_handle->runQuery("SELECT * FROM menu WHERE code='" . $_GET["code"] . "'");
      $itemArray = array($productByCode[0]["code"] => array('name' => $productByCode[0]["name"], 'code' => $productByCode[0]["code"], 'quantity' => 1, 'price' => $productByCode[0]["price"], 'image' => $productByCode[0]["image"]));

      if (!empty($_SESSION["cart_item"])) {
        if (in_array($productByCode[0]["code"], array_keys($_SESSION["cart_item"]))) {
          foreach ($_SESSION["cart_item"] as $k => $v) {
            if ($productByCode[0]["code"] == $k) {
              if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                $_SESSION["cart_item"][$k]["quantity"] = 0;
              }
              $_SESSION["cart_item"][$k]["quantity"] += 1;
            }
          }
        } else {
          $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
        }
      } else {
        $_SESSION["cart_item"] = $itemArray;
      }

      break;
    case "remove":
      if (!empty($_SESSION["cart_item"])) {
        foreach ($_SESSION["cart_item"] as $k => $v) {
          if ($_GET["code"] == $k)
            unset($_SESSION["cart_item"][$k]);
          if (empty($_SESSION["cart_item"]))
            unset($_SESSION["cart_item"]);
        }
      }
      break;
    case "empty":
      unset($_SESSION["cart_item"]);
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
          <li><a href="tablenum.php">Meja</a></li>
          <li><a href="menu.php#menu">Menu</a></li>
        </ul>
      </nav><!-- .navbar -->

      <a href="cart.php" class="bi bi-cart position-relative">
        <?php
        if (isset($_SESSION["cart_item"])) {
          $tquantity = 0;
          foreach ($_SESSION["cart_item"] as $item) {
            $tquantity += $item["quantity"];

        ?>

        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
          <?php
            echo $tquantity;
          ?>

        </span>
        <?php }
        } ?>

      </a>
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->


  <main id="main">

    <!-- ======= Menu Section ======= -->
    <section id="menu" class="menu">
      <div class="container" data-aos="fade-up">



        <ul class="nav nav-tabs d-flex justify-content-center" data-aos="fade-up" data-aos-delay="200">

          <li class="nav-item">
            <a class="nav-link active show" data-bs-toggle="tab" data-bs-target="#menu-makanan">
              <h4>Makanan</h4>
            </a>
          </li><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-minuman">
              <h4>Minuman</h4>
            </a><!-- End tab nav item -->

          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="tab" data-bs-target="#menu-ytf">
              <h4>Yong Tau Foo</h4>
            </a>
          </li><!-- End tab nav item -->



        </ul>

        <div class="tab-content" data-aos="fade-up" data-aos-delay="300">

          <div class="tab-pane fade active show" id="menu-makanan">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Makanan</h3>
            </div>

            <div class="row gy-5">

              <?php
              $product_array = $db_handle->runQuery("SELECT * FROM menu WHERE category='makanan' ORDER BY id ASC");
              if (!empty($product_array)) {
                foreach ($product_array as $key => $value) {
              ?>
              <div class="col-6 menu-item">
                <a href="menu.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                  <img class="menu-img img-fluid" src="<?php echo $product_array[$key]["image"]; ?>">
                  <h4>
                    <?php echo $product_array[$key]["name"]; ?>
                  </h4>
                  <p class="ingredients">
                    <?php echo $product_array[$key]["description"]; ?>
                  </p>
                  <p class="price">
                    <?php echo "RM" . $product_array[$key]["price"]; ?>
                  </p>
                </a>

              </div>
              <?php
                }
              }
              ?>
            </div>


          </div>

          <div class="tab-pane fade active" id="menu-minuman">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Minuman</h3>
            </div>

            <div class="row gy-5">

              <?php
              $product_array = $db_handle->runQuery("SELECT * FROM menu WHERE category='minuman' ORDER BY id ASC");
              if (!empty($product_array)) {
                foreach ($product_array as $key => $value) {
              ?>
              <div class="col-lg-6 col-6 menu-item">
                <a href="menu.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                  <img class="menu-img img-fluid mx-auto d-block" src="<?php echo $product_array[$key]["image"]; ?>">
                  <h4>
                    <?php echo $product_array[$key]["name"]; ?>
                  </h4>
                  <p class="ingredients">
                    <?php echo $product_array[$key]["description"]; ?>
                  </p>
                  <p class="price">
                    <?php echo "RM" . $product_array[$key]["price"]; ?>
                  </p>
                </a>

              </div>
              <?php
                }
              }
              ?>
            </div>


          </div>

          <div class="tab-pane fade active" id="menu-ytf">

            <div class="tab-header text-center">
              <p>Menu</p>
              <h3>Yong Tau Foo</h3>
            </div>

            <div class="row gy-5">

              <?php
              $product_array = $db_handle->runQuery("SELECT * FROM menu WHERE category='ytf' ORDER BY id ASC");
              if (!empty($product_array)) {
                foreach ($product_array as $key => $value) {
              ?>
              <div class="col-lg-6 col-6 menu-item">
                <a href="menu.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                  <img class="menu-img img-fluid mx-auto d-block" src="<?php echo $product_array[$key]["image"]; ?>">
                  <h4>
                    <?php echo $product_array[$key]["name"]; ?>
                  </h4>
                  <p class="ingredients">
                    <?php echo $product_array[$key]["description"]; ?>
                  </p>
                  <p class="price">
                    <?php echo "RM" . $product_array[$key]["price"]; ?>
                  </p>
                </a>

              </div>
              <?php
                }
              }
              ?>
            </div>


          </div>

        </div><!-- End  Menu Content -->




      </div>




    </section><!-- End Menu Section -->




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

</body>

</html>