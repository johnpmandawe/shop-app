<?php 
include_once 'config.php';
$fetchProdDetails = new Conn();
$output = '';
$fetch = $fetchProdDetails->fetchProdDetails($_POST['prod_id']);
foreach ($fetch as $row) {
  $output .= '<input type="file" name="image" style="margin-bottom: 10px;"/>
              <input type="number" name="prod_id" value="'.$row['product_id'].'" hidden/>
              <input type="text" name="prod_name" value="'.$row['name'].'" class="input_field prod_field"/>
              <input type="text" name="prod_size" value="'.$row['size'].'" class="input_field prod_field"/>
              <input type="number" name="prod_stock" value="'.$row['stock'].'" class="input_field prod_field"/>
              <input type="number" name="prod_price" value="'.$row['price'].'" class="input_field prod_field"/>';
}
echo $output;
?>