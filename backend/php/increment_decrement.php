<?php 
include_once 'config.php';
$incrementQuant = new Conn();
$incrementQuant->incrementDecrement($_POST['cart_quant'], $_POST['cart_total'], $_POST['cart_id']);
?>