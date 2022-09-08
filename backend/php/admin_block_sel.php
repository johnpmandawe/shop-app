<?php
include_once 'config.php';
$adminBlockSel = new Conn();
$block = $adminBlockSel->adminBlockSel($_POST['seller_id']);
if($block) {
  echo "success";
} else {
  echo "failed";
}
?>