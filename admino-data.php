<?php
session_start();
require_once("assets/controller/dbcontroller.php");
$db_handle = new DBController();


$url = "rawbt-receipt.php";
$result = $db_handle->runQuery("SELECT * FROM pesanan WHERE foodstate='0' ");
if (!empty($result)) {
   
    foreach ($result as $order) {


        echo '<div class="swiper-slide event-item d-flex flex-column justify-content-end"';
        echo 'style="background-image: url(assets/img/payment-systems.jpg)">';
        echo '<h3>';
        echo 'Meja ' . $order["tablen"];
        echo '</h3>';
        echo '<div class="price align-self-start">';
        echo 'RM' . number_format($order['tprice'], 2);
        echo '</div>';
        echo '<div class="row">';
        $namelist = json_decode($order["name"]);
        $quantitylist = json_decode($order["quantity"]);
        $quantityrow = 0;
        $ref = $order["ref"];
        foreach ($namelist as $name) {
            echo '<p class="description">';
            echo $name . ' x ' . $quantitylist[$quantityrow];
            echo '</p>';
            ++$quantityrow;
        }

        
        // echo '<h3><a href="?action=receipt&ref=' . $order["ref"] . '"><i class="bi bi-receipt-cutoff"></i></a> </h3>';
        // echo '<a href="?action=paid&ref=' . $order["ref"] . '"><i class="bi bi-check2"></i></a></h3>';
        
        echo '<div class="col-12 mt-3 text-center">';
        echo '<h3 style="font-size: 36px;"><a href="" onclick="';
        echo "ajax_print('";
        echo "rawbt-receipt.php";
        echo '?action=receipt&ref=';
        echo $ref;
        echo "')";
        echo '"><i class="bi bi-receipt-cutoff"></i></a></h3>';
        echo '</div>';

        echo '</div>';
        echo '';
        echo '</div>';
        


    }   



} else {
    echo '<div class="swiper-slide event-item d-flex flex-column justify-content-end">';
    echo '<div class="price align-self-start">No Orders</div>';
    echo '<p class="description">';
    echo '</p>';
    echo '</div><!-- End Event item -->';
}
?>