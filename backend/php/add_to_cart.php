<?php
session_start();
include_once 'config.php';
$addToCart = new Conn();
parse_str($_POST['formData'], $output);
$quant = $addToCart->getProductQuant($output['prod_id']);
if ($output['quant'] <= $quant) { // If quantity input is LESS THAN or equal to product stock, add it to cart.
  $add = $addToCart->addToCart($output['name'], $output['size'], $output['price'], $output['quant'], $output['total'], $_SESSION['customer_id'], $output['prod_id'], $output['seller_id']); // Add to cart command/query.
  if ($add) { // If added to cart
    echo 'success';
  } else {
    echo 'failed';
  }
} else { // If quantity input is GREATER THAN product stock, display an error message.
  echo 'Insufficient stock';
}
?>