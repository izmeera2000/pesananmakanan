<?php 
session_start();

include('assets/vendor/phpqrcode/qrlib.php');

if(!empty($_SESSION["qrtable"]))
{
    $qrtable= $_SESSION["qrtable"];

    $qr = 'http://192.168.43.9/pesananmakanan/menu.php?tablen='.$qrtable    ;


    QRcode::png($qr,false,'QR_ECLEVEL_L',20,1);   
}

?>

