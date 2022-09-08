<?php 
session_start();
include_once 'config.php';
$getCusOrder = new Conn();
$output = '';
$fetch = $getCusOrder->getCusOrders($_SESSION['customer_id']);
if ($fetch->rowCount() > 0) {
  foreach ($fetch as $row) {
    if ($row['payment'] == "COD") {
      if($row['status'] == "Confirmed") {
        $output .= '<div class="order">
                  <p class="flex">Order #<span class="trans_code">'.$row['order_id'].' </span><span class="show_details"><button>Show</button></span></p>
                  <div class="order_details">
                    <p class="prod_id" style="display: none;">'.$row['prod_id'].'</p>
                    <p>Item: '.$row['name'].'</p>
                    <p>Size: '.$row['size'].'</p>
                    <p>Quantity: <span class="prod_quant">'.$row['quant'].'</span></p>
                    <p>Price: '.$row['price'].'</p>
                    <p>Total: '.$row['total'].'</p>
                    <p>Status: '.$row['status'].'</p>
                    <p>Date: '.$row['date'].'</p>
                    <p>Payment Method: '.$row['payment'].'</p>
                  </div>
                  <p class="confirmedd">'.$row['status'].'</p>
                </div>';
      } else {
        $output .= '<div class="order">
                  <p class="flex">Order #<span class="trans_code">'.$row['order_id'].' </span><span class="show_details"><button>Show</button></span></p>
                  <div class="order_details">
                    <p class="prod_id" style="display: none;">'.$row['prod_id'].'</p>
                    <p>Item: '.$row['name'].'</p>
                    <p>Size: '.$row['size'].'</p>
                    <p>Quantity: <span class="prod_quant">'.$row['quant'].'</span></p>
                    <p>Price: '.$row['price'].'</p>
                    <p>Total: '.$row['total'].'</p>
                    <p>Status: '.$row['status'].'</p>
                    <p>Date: '.$row['date'].'</p>
                    <p>Payment Method: '.$row['payment'].'</p>
                  </div>
                  <button class="cancel">Cancel Order</button>
                </div>';
      }
    } else {
      if($row['status'] == "Confirmed") {
        $output .= '<div class="order">
                  <p class="flex">Order #<span class="trans_code">'.$row['order_id'].' </span><span class="show_details"><button>Show</button></span></p>
                  <div class="order_details">
                    <p class="prod_id" style="display: none;">'.$row['prod_id'].'</p>
                    <p>Item: '.$row['name'].'</p>
                    <p>Size: '.$row['size'].'</p>
                    <p>Quantity: <span class="prod_quant">'.$row['quant'].'</span></p>
                    <p>Price: '.$row['price'].'</p>
                    <p>Total: '.$row['total'].'</p>
                    <p>Status: '.$row['status'].'</p>
                    <p>Date: '.$row['date'].'</p>
                    <p>Payment Method: '.$row['payment'].'</p>
                  </div>
                  <p class="confirmedd">'.$row['status'].'</p>
                </div>';
      } else {
        $output .= '<div class="order">
                  <p class="flex">Order #<span class="trans_code">'.$row['order_id'].' </span><span class="show_details"><button>Show</button></span></p>
                  <div class="order_details">
                    <p class="prod_id" style="display: none;">'.$row['prod_id'].'</p>
                    <p>Item: '.$row['name'].'</p>
                    <p>Size: '.$row['size'].'</p>
                    <p>Quantity: <span class="prod_quant">'.$row['quant'].'</span></p>
                    <p>Price: '.$row['price'].'</p>
                    <p>Total: '.$row['total'].'</p>
                    <p>Status: '.$row['status'].'</p>
                    <p>Date: '.$row['date'].'</p>
                    <p>Payment Method: '.$row['payment'].'</p>
                  </div>
                  <p class="confirmedd">'.$row['status'].'</p>
                </div>';
      }
    }
    
  }
} else {
  $output = "No orders yet.";
}
echo $output;
?>