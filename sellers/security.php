<?php 
session_start();
include_once '../backend/php/config.php';
$getSellerUID = new Conn();
$getUID = $getSellerUID->getSellerUID($_SESSION['seller_id']);
if ($getUID->rowCount() <= 0) {
  header("location: ../");
}
?>