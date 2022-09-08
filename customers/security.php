<?php 
session_start();
include_once '../backend/php/config.php';
$getCusUID = new Conn();
$getUID = $getCusUID->getCustomerUID($_SESSION['customer_id']);
if ($getUID->rowCount() <= 0) {
  header("location: ../");
}
?>