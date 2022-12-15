<?php
session_start();

require_once("assets/controller/dbcontroller.php");
$db_handle = new DBController();

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
            $_SESSION["cart_item"][$k]["quantity"] -= 1;
          // unset($_SESSION["cart_item"][$k]);
          if (empty($_SESSION["cart_item"][$k]["quantity"])) {
            unset($_SESSION["cart_item"][$k]);
          }
          if (empty($_SESSION["cart_item"])) {
            unset($_SESSION["cart_item"]);
          }
        }

      }
      break;
    case "empty":
      unset($_SESSION["cart_item"]);
      break;

    case "pay2":
      $ref = $_SESSION["ref"];
      $tablen = $_SESSION["tablen"];
      $t = time();
      $t2 = date("d/m/Y", $t);
      $total_quantity = 0;
      $total_price = 0;
      $itemarray = array();
      $imagearray = array();
      $namearray = array();
      $quantityarray = array();
      $pricearray = array();

      foreach ($_SESSION["cart_item"] as $item) {
        $total_quantity += $item["quantity"];
        $total_price += ($item["price"] * $item["quantity"]);

        $newitem = $item["code"];
        $newname = $item["name"];
        $newimage = $item["image"];

        $newquantity = $item["quantity"];
        $newprice = $item["price"];

        $itemarray[] = $newitem;
        $namearray[] = $newname;
        $imagearray[] = $newimage;
        $quantityarray[] = $newquantity;
        $pricearray[] = $newprice;

        //item
        //name 
        //quantity /
        //price
      }
      // echo "<script type='text/javascript'>alert('" . $row . "');</script>";

      $db_handle->uploadFOrder("INSERT INTO pesanan (ref,tablen,item,name,image,quantity,tquantity,price,tprice,timedate,foodstate) 
       VALUES ('$ref','$tablen','" . json_encode($itemarray) . "','" . json_encode($namearray) . "','" . json_encode($imagearray) . "', '" . json_encode($quantityarray) . "','" . $total_quantity . "','" . json_encode($pricearray) . "','" . $total_price . "','$t2','3')");
        unset($_SESSION["cart_item"]);
        // unset($_SESSION["ref"]);
        unset($_SESSION["tablen"]);

        header("Location:payment.php");
      break;

      case "pay3":
        $ref = $_SESSION["ref"];
        $tablen = $_SESSION["tablen"];
        $t = time();
        $t2 = date("d/m/Y", $t);
        $total_quantity = 0;
        $total_price = 0;
        $itemarray = array();
        $imagearray = array();
        $namearray = array();
        $quantityarray = array();
        $pricearray = array();
  
        foreach ($_SESSION["cart_item"] as $item) {
          $total_quantity += $item["quantity"];
          $total_price += ($item["price"] * $item["quantity"]);
  
          $newitem = $item["code"];
          $newname = $item["name"];
          $newimage = $item["image"];
  
          $newquantity = $item["quantity"];
          $newprice = $item["price"];
  
          $itemarray[] = $newitem;
          $namearray[] = $newname;
          $imagearray[] = $newimage;
          $quantityarray[] = $newquantity;
          $pricearray[] = $newprice;
  
          //item
          //name 
          //quantity /
          //price
        }
        // echo "<script type='text/javascript'>alert('" . $row . "');</script>";
  
        $db_handle->uploadFOrder("INSERT INTO pesanan (ref,tablen,item,name,image,quantity,tquantity,price,tprice,timedate,foodstate) 
         VALUES ('$ref','$tablen','" . json_encode($itemarray) . "','" . json_encode($namearray) . "','" . json_encode($imagearray) . "', '" . json_encode($quantityarray) . "','" . $total_quantity . "','" . json_encode($pricearray) . "','" . $total_price . "','$t2','3')");
          unset($_SESSION["cart_item"]);
          unset($_SESSION["ref"]);
          unset($_SESSION["tablen"]);
  
          header("Location:payment2.php");
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
          <li><a href="menu.php">Menu</a></li>
        </ul>

      </nav><!-- .navbar -->
      <a href="menu.php" class="bi bi-cart-plus position-relative">
      </a>

      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

    </div>
  </header><!-- End Header -->


  <main id="main">

    <!-- ======= Menu Section ======= -->
    <section id="hero" class="hero">
      <div class="container" data-aos="fade-up">



        <div id="shopping-cart">
          <div class="tab-header text-center">

            <h3>Shopping Cart</h3>
          </div>
          <div class="row gy-5">

            <?php
            if (isset($_SESSION["cart_item"])) {
              $total_quantity = 0;
              $total_price = 0;
            ?>
            <table class="tbl-cart" cellpadding="10" cellspacing="1">
              <tbody>
                <tr>
                  <th style="text-align:left;">Name</th>
                  <th style="text-align:right;" width="5%">Quantity</th>
                  <th style="text-align:right;" width="10%">Unit Price</th>
                  <th style="text-align:right;" width="10%">Price</th>
                  <th style="text-align:center;" width="5%">Remove</th>
                </tr>
                <?php
              foreach ($_SESSION["cart_item"] as $item) {
                $item_price = $item["quantity"] * $item["price"];
                ?>
                <tr>
                  <td class="col-4"><img src="<?php echo $item["image"]; ?>"
                      class="menu-img img-fluid mx-auto d-block" />
                    <p class="text-center">
                      <?php echo $item["name"]; ?>
                    </p>
                  </td>
                  <td>
                    <p class="text-center">
                      <?php echo $item["quantity"]; ?>
                    </p>
                  </td>
                  <td style="text-align:right;">
                    <?php echo "RM " . $item["price"]; ?>
                  </td>
                  <td style="text-align:right;">
                    <?php echo "RM " . number_format($item_price, 2); ?>
                  </td>
                  <td style="text-align:center;"><a href="cart.php?action=remove&code=<?php echo $item["code"]; ?>"
                      class="btnRemoveAction"><i class="bi bi-cart-dash"></i></td>
                </tr>
                <?php
                $total_quantity += $item["quantity"];
                $total_price += ($item["price"] * $item["quantity"]);
              }
                ?>

                <tr>
                  <td colspan="1" align="right">Total:</td>
                  <td align="center">
                    <?php echo $total_quantity; ?>
                  </td>
                  <td align="right" colspan="2" style="text-align:right;"><strong>
                      <?php echo "RM " . number_format($total_price, 2); ?>
                    </strong></td>

                  <td style="text-align:center;"> <a id="btnEmpty" href="cart.php?action=empty"><i
                        class="bi bi-cart-x"></i></a>
                  </td>

                </tr>

              </tbody>
            </table>

            <div
              class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">

              <a href="cart.php?action=pay2" class="btn-book-a-table">Bayar RM
                <?php echo number_format($total_price, 2) ?> Cash
              </a>

            </div>
            <div
              class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">

              <a href="cart.php?action=pay3" class="btn-book-a-table">Bayar RM
                <?php echo number_format($total_price, 2) ?> Online
              </a>

            </div>
            <?php

            } else {
            ?>
            <section id="why-us" class="why-us section">


              <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                <div class="why-box">
                  <h3 class="text-center">Your Cart Is Empty <i class="bi bi-cart-x"></i></h3>
                  <div class="text-center">
                    <a href="menu.php" class="more-btn">Go back to Menu <i class="bx bx-chevron-left"></i></a>
                  </div>
                </div>
              </div><!-- End Why Box -->




            </section>
            <?php
            }
            ?>
          </div>



        </div>
      </div><!-- End Starter Menu Content -->






      </div>

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