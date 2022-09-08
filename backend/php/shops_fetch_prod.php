<?php 
include_once 'config.php';
$prod_id = $_POST['prod_id'];
$prod_size = trim($_POST['prod_size']);
$fetchProd = new Conn();
$output = '';
$fetch = $fetchProd->fetchProdDetails($prod_id);
if(!empty($prod_size)) {
   if ($fetch->rowCount() > 0) {
      foreach ($fetch as $row) {
        $output = '<div class="order_input_group flex">
                    
                     <p>Item: </p>
                     <input type="text" name="name" class="input_field order_quant" value="'.$row['name'].'" readonly/>
        
                  </div>
                  <div class="order_input_group flex">
                    
                     <p>Size: </p>
                     <input type="text" name="size" class="input_field order_quant" value="'.$prod_size.'" readonly/>
        
                  </div>
                  <div class="order_input_group flex">
                    
                     <p>Price: </p>
                     <input type="number" name="price" class="input_field order_quant" value="'.$row['price'].'" readonly/>
        
                  </div>
        
                  <input type="hidden" name="prod_id" class="prod_id" value="'.$row['product_id'].'" readonly/>';
      }
    }
} else {
  echo 'failed';
}
echo $output;
?>