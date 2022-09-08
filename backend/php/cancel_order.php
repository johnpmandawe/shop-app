<?php 
include_once 'config.php';
$trans_code = $_POST['trans_code'];
$quant = $_POST['quant'];
$prod_id = $_POST['prod_id'];
$cancelOrder = new Conn();
$cancel = $cancelOrder->cancelOrder($quant, $prod_id, $trans_code);
if ($cancel) {
  echo 'success';
} else {
  echo 'failed';
}
?>