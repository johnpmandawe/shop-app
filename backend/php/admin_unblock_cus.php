<?php 
include_once 'config.php';
$adminUnblockCus = new Conn();
$block = $adminUnblockCus->adminUnblockCus($_POST['customer_id']);
if($block) {
  echo "success";
} else {
  echo "failed";
}
?>