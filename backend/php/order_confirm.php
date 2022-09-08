<?php
include_once 'config.php';
$getSellerID = new Conn();
$prod_id = $_POST['prod_id'];
$name = $_POST['name'];
$size = $_POST['size'];
$price = $_POST['price'];
$quant = $_POST['quant'];
$output = '';
if (!empty($quant) && !empty($size)) {
    if ($quant > 0) {
      $total = ($price * $quant);
      $output .= '<div class="order_input_group flex">
      
                    <p>Item: </p>
            
                    <input type="text" name="name" class="input_field order_quant" value="'.$name.'" readonly/>
            
                  </div>
                  <input type="hidden" name="prod_id" value="'.$prod_id.'" readonly/>';
                  $get = $getSellerID->getSellerID($prod_id);
                  foreach ($get as $row) {
                    $output .= '<input type="hidden" name="seller_id" value="'.$row['seller_id'].'" readonly/>';
                  }
      $output .= '<div class="order_input_group flex">
            
                    <p>Size: </p>
            
                    <input type="text" name="size" class="input_field order_quant" value="'.$size.'" readonly/>
            
                  </div>
            
                  <div class="order_input_group flex">
            
                    <p>Price: </p>
            
                    <input type="number" name="price" class="input_field order_quant" value="'.$price.'" readonly/>
            
                  </div>
            
                  <div class="order_input_group flex">
            
                    <p>Quantity: </p>
            
                    <input type="number" name="quant" class="input_field order_quant" value="'.$quant.'" readonly/>
            
                  </div>
            
                  <div class="order_input_group flex">
            
                    <p>Total: </p>
            
                    <input type="number" name="total" class="input_field order_quant" value="'.$total.'" readonly/>
            
                  </div>';
    } else {
      echo 'Invalid input';
    }
} else {
  echo 'failed';
}
echo $output;
?>