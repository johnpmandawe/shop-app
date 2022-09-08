<?php 
session_start();
if (isset($_SESSION['seller_id'])) {
  unset($_SESSION['seller_id']);
  session_destroy();
  echo 'success';
}
?>