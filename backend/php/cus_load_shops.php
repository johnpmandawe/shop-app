<?php 
include_once 'config.php';
$loadProducts = new Conn();
$fetch = $loadProducts->getAllProducts();
$output = '';
if($fetch->rowCount() > 0) {
  include 'data.php';
}
echo $output;
?>