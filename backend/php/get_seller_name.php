<?php 
session_start();
include_once 'config.php';
$getSellerName = new Conn();
$get = $getSellerName->getSellerName($_SESSION['seller_id']);
foreach($get as $row) {
  echo '<img src="seller_logo/'.$row['seller_logo'].'" class="seller_img" alt="">';
}
?>