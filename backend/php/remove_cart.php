<?php
include_once 'config.php';
$removeCart = new Conn();
$remove = $removeCart->removeCart($_POST['cart_id']);
if($remove) {
  echo 'success';
} else {
  echo 'failed';
}
// $remove = $removeCart->removeCartNew($_POST['cart_id']);
// if($remove) {
//   echo 'success';
// } else {
//   echo 'failed';
// }
?>