<?php 
include_once 'config.php';
$delProd = new Conn();
$id = $_POST['id'];
$fetchProd = $delProd->fetchProdDetails($id);
$path = "../../sellers/product_img/";
$img_name = "";
foreach ($fetchProd as $row) {
  $img_name = $row['img'];
}
$full_path = $path.$img_name;
if (file_exists($full_path)) {
  unlink($full_path);
  $delProd->deleteProd($id);
}
?>