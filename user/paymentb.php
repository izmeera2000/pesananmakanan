<?php
session_start();
require_once("../assets/controller/dbcontroller.php");
$db_handle = new DBController();
$ref = $_SESSION["ref"];

$result = $db_handle->runQuery("SELECT * FROM pesanan WHERE ref='$ref'");

if (!empty($result)){

  foreach($result as $order){
    echo $order["foodstate"];

  }



}

?>
