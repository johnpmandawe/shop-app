<?php 
include_once 'config.php';
$check = new Conn();
$check->check($_POST['check_id']);
?>