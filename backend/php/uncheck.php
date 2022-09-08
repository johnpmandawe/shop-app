<?php 
include_once 'config.php';
$check = new Conn();
$check->uncheck($_POST['check_id']);
?>