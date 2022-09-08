<?php 
include_once 'config.php';
$seller_id = $_POST['seller_id'];
$loadProducts = new Conn();
$output = '';
$fetch = $loadProducts->loadSellerProd($seller_id);
if ($fetch->rowCount() > 0) {
  foreach ($fetch as $row) {
    if ($row['stock'] > 0) {
      $output .= '<div class="shop_product">
                    <p class="prod_id" style="display: none;">'.$row['product_id'].'</p>
                    <img src="../sellers/product_img/'.$row['img'].'" alt="">
                    <p>Item: <span>'.$row['name'].'</span></p>
                    <p>Sizes:</p>';
                    $str = $row['size'];
                    $result = explode(',', $str);
                    foreach($result as $size) {
                      $output .= '<input type="radio" name="sizes" value="'.$size.'"/>'.' '.$size.'</br>';
                    }
                    $output .='<p>Stock: <span>'.$row['stock'].'</span></p>
                    <p>Price: <span>'.$row['price'].'</span></p>
                    <button class="order_btn">Order</button>
                  </div>';
    }
  }
} else {
  echo 'No products to show.';
}
echo $output;
?>