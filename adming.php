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
                    <li><a href="adminpo.php">Payment</a></li>
                    <li><a href="admino.php">Orders</a></li>
                    <li><a href="adming.php#hero">Records</a></li>
                    <li> <a href="?logout='1'">Logout</a></li>

                </ul>
            </nav><!-- .navbar -->


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

                        <h1>Records</h1>
                        <?php $t = time();
                        $t2 = date("Y-m-d", $t); ?>
                        <form method="post" action="adming.php">
                            <h3> <input type="date" name="date" placeholder="dd-mm-yyyy" min="2022-12-13"
                                    max="<?php echo $t2 ?>"></h3>
                            <input style="text-decoration: none;border: none;" type="submit">
                        </form>

                    </div>
                    <div class="row gy-5">

                        <table class="table table-responsive" cellpadding="10" cellspacing="1">
                            <tbody>
                                <thead>
                                    <th class="text-left">Name</th>
                                    <th class="text-left">Quantity</th>
                                    <th class="text-left">Unit Price</th>
                                    <th class="text-left">Total Price</th>
                                </thead>
                                <?php

                                $tprice2 = 0;
                                if (!empty($_POST["date"])) {

                                    $orgdate = $_POST["date"];
                                    $newdate = date("d/m/Y", strtotime($orgdate));

                                } else {
                                    $t5 = time();
                                    $newdate = date("d/m/Y", $t5);
                                }
                                $records = $db_handle->runQuery("SELECT * FROM pesanan WHERE timedate='$newdate'");

                                if (!empty($records)){
                                foreach ($records as $record) {
                                    $namelist = json_decode($record["name"]);
                                    $quantitylist = json_decode($record["quantity"]);
                                    $pricelist = json_decode($record["price"]);
                                    $tprice = $record["tprice"];
                                    $tprice2 = $tprice2 + $tprice;
                                    ?>                       


                                     <?php   if ($record["foodstate"] == 0) { ?>
                               
                                <tr class="alert alert-dark">

                                    <td>
                                        <p class="text-left">

                                            <?php
                                            echo '<i><b>Table ' . $record["tablen"] . '</b>: ' . $record["ref"] . '</i>';
                                            echo '</br>';
                                            foreach ($namelist as $name) {

                                                echo $name;
                                                echo '</br>';
                                            }
                                            ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-left">
                                            <?php
                                            echo '</br>';
                                            foreach ($quantitylist as $quantity) {

                                                echo $quantity;
                                                echo '</br>';
                                            }
                                            ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-left">
                                            <?php
                                            echo '</br>';
                                            foreach ($pricelist as $price) {

                                                echo "RM" . $price;
                                                echo '</br>';
                                            }
                                            ?>
                                        </p>
                                    </td>
                                    <td>
                                        <p class="text-left">
                                            <?php
                                            echo '</br>';
                                            echo "RM" . number_format($tprice, 2);
                                            ?>
                                        </p>
                                    </td>
                                </tr>
                               <?php  } ?>

                               <?php   if ($record["foodstate"] == 1) { ?>
                               
                               <tr class="alert alert-success">

                                   <td>
                                       <p class="text-left">

                                           <?php
                                           echo '<i><b>Table ' . $record["tablen"] . '</b>: ' . $record["ref"] . '</i>';
                                           echo '</br>';
                                           foreach ($namelist as $name) {

                                               echo $name;
                                               echo '</br>';
                                               echo '</br>';

                                           }
                                           ?>
                                           
                                       </p>
                                   </td>
                                   <td>
                                       <p class="text-left">
                                           <?php
                                           echo '</br>';
                                           foreach ($quantitylist as $quantity) {

                                               echo $quantity;
                                               echo '</br>';
                                           }
                                           ?>
                                       </p>
                                   </td>
                                   <td>
                                       <p class="text-left">
                                           <?php
                                           echo '</br>';
                                           foreach ($pricelist as $price) {

                                               echo "RM" . $price;
                                               echo '</br>';
                                           }
                                           ?>
                                       </p>
                                   </td>
                                   <td>
                                       <p class="text-left">
                                           <?php
                                           echo '</br>';
                                           echo "RM" . number_format($tprice, 2);
                                           ?>
                                       </p>
                                   </td>
                               </tr>
                              <?php  } ?>

                              <?php   if ($record["foodstate"] == 2) { ?>
                               
                               <tr class="alert alert-danger">

                                   <td>
                                       <p class="text-left">

                                           <?php
                                           echo '<i><b>Table ' . $record["tablen"] . '</b>: ' . $record["ref"] . '</i>';
                                           echo '</br>';
                                           foreach ($namelist as $name) {

                                               echo $name;
                                               echo '</br>';
                                           }
                                           ?>
                                       </p>
                                   </td>
                                   <td>
                                       <p class="text-left">
                                           <?php
                                           echo '</br>';
                                           foreach ($quantitylist as $quantity) {

                                               echo $quantity;
                                               echo '</br>';
                                           }
                                           ?>
                                       </p>
                                   </td>
                                   <td>
                                       <p class="text-left">
                                           <?php
                                           echo '</br>';
                                           foreach ($pricelist as $price) {

                                               echo "RM" . $price;
                                               echo '</br>';
                                           }
                                           ?>
                                       </p>
                                   </td>
                                   <td>
                                       <p class="text-left">
                                           <?php
                                           echo '</br>';
                                           echo "RM" . number_format($tprice, 2);
                                           ?>
                                       </p>
                                   </td>
                               </tr>
                              <?php  } ?>

                              <?php   if ($record["foodstate"] == 3) { ?>
                               
                               <tr class="alert alert-warning">

                                   <td>
                                       <p class="text-left">

                                           <?php
                                           echo '<i><b>Table ' . $record["tablen"] . '</b>: ' . $record["ref"] . '</i>';
                                           echo '</br>';
                                           foreach ($namelist as $name) {

                                               echo $name;
                                               echo '</br>';
                                           }
                                           ?>
                                       </p>
                                   </td>
                                   <td>
                                       <p class="text-left">
                                           <?php
                                           echo '</br>';
                                           foreach ($quantitylist as $quantity) {

                                               echo $quantity;
                                               echo '</br>';
                                           }
                                           ?>
                                       </p>
                                   </td>
                                   <td>
                                       <p class="text-left">
                                           <?php
                                           echo '</br>';
                                           foreach ($pricelist as $price) {

                                               echo "RM" . $price;
                                               echo '</br>';
                                           }
                                           ?>
                                       </p>
                                   </td>
                                   <td>
                                       <p class="text-left">
                                           <?php
                                           echo '</br>';
                                           echo "RM" . number_format($tprice, 2);
                                           ?>
                                       </p>
                                   </td>
                               </tr>
                              <?php  } ?>
                              
                              <?php } }?>


                                <tr>


                                    <td colspan="3" align="right"><b>Total:</b></td>
                                    <td align="left">
                                        <?php echo "<b>RM" . number_format($tprice2, 2) . '</b>'?>
                                    </td>




                                </tr>
                            </tbody>
                        </table>


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