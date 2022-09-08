<?php
session_start();
include_once 'config.php';
$loadCart = new Conn();
$output = '';
$load = $loadCart->loadCart($_SESSION['customer_id']);
$items = '';
$sizes = '';
$prices = '';
if($load->rowCount() > 0) {
  foreach($load as $row) {
    $items .= $row['items'].', ';
    $sizes .= $row['sizes'].', ';
    $prices .= $row['prices'].', ';
    $output .= '<div class="cart">
                  <p style="text-align: center; font-size: 20px;">'.$row['shop_name'].'</p>
                  <span class="cart_id" style="display: none;">'.$row['seller_id'].'</span>
                  <button class="cart_btn_details cbtn">Show</button>
                  <div class="cart_details">
                    <p>Items: '.$row['items'].'</p>
                    <p>Sizes: '.$row['sizes'].'</p>
                    <p>Prices: '.$row['prices'].'</p>
                    <p>Total Items: '.$row['total_items'].'</p>
                    <p>Total Amount: '.$row['total_amount'].'</p>
                  </div>
                  <button class="cart_btn_remove cbtn">Remove</button>
                </div>';
  }
} else {
  echo 'Empty.';
}
echo $output;
?>