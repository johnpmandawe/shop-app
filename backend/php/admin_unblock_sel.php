<?php 
include_once 'config.php';
$adminUnblockSel = new Conn();
$block = $adminUnblockSel->adminUnblockSel($_POST['seller_id']);
if($block) {
  echo "success";
} else {
  echo "failed";
}
?>