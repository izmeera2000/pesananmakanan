<?php 
session_start();

include('assets/vendor/phpqrcode/qrlib.php');

if(!empty($_SESSION["qrtable"]))
{
    $qrtable= $_SESSION["qrtable"];

    $qr = 'https://taipingyongtaufoo.000webhostapp.com/menu.php?tablen='.$qrtable    ;


    QRcode::png($qr,false,'QR_ECLEVEL_L',20,1);   
}

?>

