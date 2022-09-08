<?php 
include_once 'config.php';
$fetchProducts = new Conn();
$fetch = $fetchProducts->fetchProducts($_POST['searchStr']);
$output = '';
if ($fetch->rowCount() > 0) {
  include 'data.php';
} else {
  echo "No results found.";
}
echo $output;
?>