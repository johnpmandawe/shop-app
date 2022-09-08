<?php 
foreach ($fetch as $row) {
  if ($row['stock'] > 0) { // If product stock is greater than zero zero
    $output .= '<div class="shop_product">
                  <p class="prod_id" style="display: none;">'.$row['product_id'].'</p>
                  <img src="../sellers/product_img/'.$row['img'].'" alt="">
                  <p>Item: <span>'.$row['name'].'</span></p>
                  <p>Sizes: '.$row['size'].'</p>
                  <p>Stock: <span>'.$row['stock'].'</span></p>
                  <p>Price: <span>'.$row['price'].'</span></p>
                  <a href="shops.php?shop_id='.$row['seller_id'].'" class="go_to">Visit shop</a>
                </div>';
  }
}
?>