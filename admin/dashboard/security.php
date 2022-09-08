<?php
session_start();
include_once '../../backend/php/config.php';
$getAdminUID = new Conn();
$get = $getAdminUID->getAdminUID($_SESSION['admin_id']);
if ($get->rowCount() <= 0) {
  header("location: ../");
}
?>