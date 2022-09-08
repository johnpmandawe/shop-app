<?php 
session_start();
include_once 'config.php';
$total = 0;
$getTotal = new Conn();
$get = $getTotal->loadCartForOrders($_SESSION['customer_id']);
foreach($get as $row) {
  $total = $row['total_amount'];
}
echo '<input type="number" name="total" class="total" value="'.$total.'"/>';
// $get = $getTotal->loadAllFromCart($_POST['cart_id']);
// foreach($get as $row) {
//   $total = $row['total'];
// }
// echo '<input type="number" name="total" class="total" value="'.$total.'"/>
//       <input type="hidden" name="cart_id" value="'.$_POST['cart_id'].'"/>';
?>