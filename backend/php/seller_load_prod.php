<?php 
session_start();
include_once 'config.php';
$loadSellerProd = new Conn();
// $output = '';
$load = $loadSellerProd->loadSellerProd($_SESSION['seller_id']);
if ($load->rowCount() > 0) {
  while ($row = $load->fetch()) {
    ?>
    <div class="product">
      <div class="prod_img_wrapper">
        <img src="product_img/<?php echo $row['img']; ?>" class="product_image" alt="">
      </div>
      <p class="product_name">Name: <span><?php echo $row['name']; ?></span></p>
      <p class="product_size">Size: <span><?php echo $row['size']; ?></span></p>
      <p class="product_stock">Stock: <span><?php echo $row['stock']; ?></span></p>
      <p class="product_price">Price: <span><?php echo $row['price']; ?></span></p>
      <div class="ops flex">
        
        <p style="display: none;" class="product_id"><?php echo $row['product_id']; ?></p>
        <button class="prod_update">Update</button>
        <button class="prod_delete">Delete</button>
      </div>
    </div>
    <?php
  }
} else {
  echo 'failed';
}
?>