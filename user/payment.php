<?php
session_start();
require_once("../assets/controller/dbcontroller.php");
$db_handle = new DBController();

if (!empty($_GET["tablen"])) {
  header("Location:menu.php");

}
$ref = $_SESSION["ref"];


// $payment = $db_handle->numRows("SELECT * FROM pesanan WHERE foodstate='0' AND ref='$ref'");
// if (!empty($payment)) {
// echo '<pre>'; print_r($payment); echo '</pre>';
// header("Location:payment4.php");



// }
if (!empty($_GET["action"])) {
  switch ($_GET["action"]) {
    case "fooddone":

      $productByCode = $db_handle->updateState("UPDATE pesanan SET foodstate='1' WHERE ref='" . $ref . "'");

      unset($_SESSION["ref"]);
      header("Location:menu.php");
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
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Amatic+SC:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/main.css" rel="stylesheet">

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
        <!-- <img src="../assets/img/logo.png" alt=""> -->
        <h1>Taiping Yong Tau Foo</h1>
      </a>

      <!-- <nav id="navbar" class="navbar">
        <ul>
          <li><a href="tablenum.php">Meja</a></li>
        </ul>
      </nav> -->
      <!-- .navbar -->

<!-- 
      <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
      <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i> -->

    </div>
  </header><!-- End Header -->


  <main id="main">

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="hero d-flex align-items-center ">
      <div class="container">
        <div class="row justify-content-between gy-5">
          <div
            class="col-lg-6 order-2 order-lg-6 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">

            <h2 data-aos="fade-up" id="timer" style="display:none"></h2>
          </div>
          <div
            class="col-lg-6 order-2 order-lg-6 d-flex flex-column justify-content-center align-items-center align-items-lg-start text-center text-lg-start">
            <div id="data"></div>
            <div id="data2"></div>

            <h2 data-aos="fade-up" id="payment1" style="display:none">Sila buat pembayaran di kaunter</h2>
            <h2 data-aos="fade-up" id="payment2a" style="display:none">Terima Kasih</h2>
            <p data-aos="fade-up" data-aos-delay="100" id="payment2b" style="display:none">Tunggu Sebentar Untuk Makanan
            </p>
            <a class="btn-book-a-table" style="display:none" id="payment2c"
              href='?action=fooddone&ref=<?php echo $ref ?>'><i class="bi bi-check-lg"></i></a>
          </div>
          <div class="col-lg-6 order-1 order-lg-6 text-center text-lg-start">
            <div class="d-flex justify-content-center">

            </div>
          </div>
        </div>
      </div>
    </section><!-- End Hero Section -->




  </main><!-- End #main -->



  <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script type="text/javascript">
    function table() {
      const xhttp = new XMLHttpRequest();
      xhttp.onload = function () {
        // document.getElementById("data").innerHTML = this.responseText;
        // if (document.getElementById("data").innerHTML != "") {
        // }

        if (this.responseText == "3") {
          document.getElementById("payment1").style.display = "block";
          document.getElementById("payment2a").style.display = "none";
          document.getElementById("payment2b").style.display = "none";
          document.getElementById("payment2c").style.display = "none";

          document.getElementById("timer").style.display = "none";

          var now = new Date().getTime();

          // Get today's date and time

          // Find the distance between now and the count down date

          var distance = tmin - now;
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // Output the result in an element with id="demo"
          document.getElementById("timer").innerHTML = minutes + " M " + seconds + " S ";

          if (minutes == 25 && seconds == 00) {
   
              alert("Sila buat pembayaran di kaunter");
              navigator.vibrate([500, 300, 100]);


          }

          // If the count down is over, write some text 
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("timer").innerHTML = "EXPIRED";
          }


        }
        else if (this.responseText == "0") {
          document.getElementById("payment1").style.display = "none";
          document.getElementById("payment2a").style.display = "block";
          document.getElementById("payment2b").style.display = "block";
          document.getElementById("payment2c").style.display = "block";

          document.getElementById("timer").style.display = "block";


          var now = new Date().getTime();

          // Get today's date and time

          // Find the distance between now and the count down date

          var distance = tmin - now;
          // Time calculations for days, hours, minutes and seconds
          var days = Math.floor(distance / (1000 * 60 * 60 * 24));
          var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);

          // Output the result in an element with id="demo"
          document.getElementById("timer").innerHTML = minutes + " M " + seconds + " S ";


          // If the count down is over, write some text 
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("timer").innerHTML = "EXPIRED";
          }

        }
        else {
          document.getElementById("payment1").style.display = "none";
          document.getElementById("payment2a").style.display = "block";
          document.getElementById("payment2b").style.display = "none";
          document.getElementById("payment2c").style.display = "none";

          document.getElementById("timer").style.display = "none";

        }


      }
      xhttp.open("GET", "paymentb.php");
      xhttp.send();
    }

    setInterval(function () {
      table();
    }, 1000);
  </script>
  <script>



    var tmin = new Date().getTime() + 1000 * 60 * 60 / 2


  </script>
</body>

</html>