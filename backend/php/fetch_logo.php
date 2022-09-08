<?php 
include_once 'config.php';
$fetchLogos = new Conn();
$output = '';
$fetch = $fetchLogos->fetchLogos();
foreach ($fetch as $row) {
  $output .= '<a href="customers/">
                <div class="image_wrappers">
                  <img src="sellers/seller_logo/'.$row['seller_logo'].'" alt="">
                </div>
              </a>';
}
echo $output;
?>