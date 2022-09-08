<?php
session_start();
include_once 'config.php';
$loadCart = new Conn();
$output = '';
$load = $loadCart->laodCartSingle($_SESSION['customer_id']);
if($load->rowCount() > 0) {
  foreach($load as $row) {
    $output .= '<div class="cart">
                  <p style="text-align: center; font-size: 20px;">'.$row['shop_name'].'</p>
                  <span class="cart_id" style="display: none;">'.$row['id'].'</span>
                  <button class="cart_btn_details cbtn">Show</button>
                  <div class="cart_details">
                    <p>Item: '.$row['item'].'</p>
                    <p>Size: '.$row['size'].'</p>
                    <p>Price: '.$row['price'].'</p>
                    <p>Qty:</p>
                    <input type="hidden" class="cart_id" value="'.$row['id'].'"/>
                    <input type="hidden" value="'.$row['price'].'" class="cart_price"/>
                    <input type="button" value="-" class="decrement"/>
                    <input type="number" value="'.$row['quant'].'" min="1" max="'.$row['stock'].'" class="value"/>
                    <input type="button" value="+" class="increment"/>
                    <p>Total: <span class="visible_cart_total">'.$row['total'].'</span></p>
                  </div>
                </div>';
  }
} else {
  echo 'Empty.';
}
echo $output;
// <button class="cart_btn_remove cbtn">Remove</button>
// <button class="cart_checkout_btn cbtn">Checkout</button>
?>