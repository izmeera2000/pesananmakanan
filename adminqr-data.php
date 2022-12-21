<?php 
session_start();

include('assets/vendor/phpqrcode/qrlib.php');


$qrtable= $_SESSION["qrtable"];

$qr = 'http://localhost/pesananmakanan/menu.php?tablen='.$qrtable    ;


QRcode::png($qr,false,'QR_ECLEVEL_L',5,1);   
?>

