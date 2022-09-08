<?php
include_once 'config.php';
$getAllShops = new Conn();
$output = '';
$get = $getAllShops->getAllShops();
if($get->rowCount() > 0) {
  foreach($get as $row) {
    if($row['blocked'] == 0) {
      $output .= '<a href="shops.php?shop_id='.$row['seller_id'].'">
                  <div class="shop flex">
                    <img src="../sellers/seller_logo/'.$row['seller_logo'].'" alt="">
                    <p>'.$row['fname'].'</p>
                </div>
                </a>';
    }
  }
}
echo $output;
?>