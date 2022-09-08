<?php
include_once 'config.php';
$adminBlockCus = new Conn();
$block = $adminBlockCus->adminBlockCus($_POST['customer_id']);
if($block) {
  echo "success";
} else {
  echo "failed";
}
?>