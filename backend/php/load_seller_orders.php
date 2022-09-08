<?php 
session_start();
include_once 'config.php';
$getSellerOrder = new Conn();
$output = '';
$fetch = $getSellerOrder->getSellerOrders($_SESSION['seller_id']);
if ($fetch->rowCount() > 0) {
  foreach ($fetch as $row) {
    if($row['payment'] == "COD") {
      if ($row['order_stat'] == "Confirmed") {
        $output .= '<div class="order">
                      <p>Order #<span class="trans_code">'.$row['trans_code'].'</span><span class="show_details" style="margin-left: 5px;"><button>Show</button></span></p>
                      <div class="order_details">
                        <p>Name: '.$row['cus_fname'].' '.$row['cus_lname'].'</p>
                        <p>Address: '.$row['cus_address'].'</p>
                        <p>Contact: '.$row['cus_cont'].'</p>
                        <p>Item Ordered: '.$row['item'].'</p>
                        <p>Quantity: '.$row['order_quant'].'</p>
                        <p>Price: '.$row['prod_price'].'</p>
                        <p>Total: '.$row['order_total'].'</p>
                        <p>Status: '.$row['order_stat'].'</p>
                        <p>Date: '.$row['order_date'].'</p>
                      </div>
                      <button class="confirm cancel confirmed" disabled="disabled">Confirmed</button>
                    </div>';
      } else {
        $output .= '<div class="order">
                      <p>Order #<span class="trans_code">'.$row['trans_code'].'</span><span class="show_details" style="margin-left: 5px;"><button>Show</button></span></p>
                      <div class="order_details">
                        <p>Name: '.$row['cus_fname'].' '.$row['cus_lname'].'</p>
                        <p>Address: '.$row['cus_address'].'</p>
                        <p>Contact: '.$row['cus_cont'].'</p>
                        <p>Item Ordered: '.$row['item'].'</p>
                        <p>Size: '.$row['size'].'</p>
                        <p>Quantity: '.$row['order_quant'].'</p>
                        <p>Price: '.$row['prod_price'].'</p>
                        <p>Total: '.$row['order_total'].'</p>
                        <p>Status: '.$row['order_stat'].'</p>
                        <p>Date: '.$row['order_date'].'</p>
                      </div>
                      <button class="confirm cancel">Confirm Order</button>
                      </div>';
      }
    } else {
      if ($row['order_stat'] == "Confirmed") {
        $output .= '<div class="order">
                      <p>Order #<span class="trans_code">'.$row['trans_code'].'</span><span class="show_details" style="margin-left: 5px;"><button>Show</button></span></p>
                      <div class="order_details">
                        <p>Name: '.$row['cus_fname'].' '.$row['cus_lname'].'</p>
                        <p>Address: '.$row['cus_address'].'</p>
                        <p>Contact: '.$row['cus_cont'].'</p>
                        <p>Item Ordered: '.$row['item'].'</p>
                        <p>Quantity: '.$row['order_quant'].'</p>
                        <p>Price: '.$row['prod_price'].'</p>
                        <p>Total: '.$row['order_total'].'</p>
                        <p>Status: '.$row['order_stat'].'</p>
                        <p>Date: '.$row['order_date'].'</p>
                      </div>
                      <button class="confirm cancel confirmed" disabled="disabled">Confirmed</button>
                    </div>';
      } else {
        $output .= '<div class="order">
                      <p>Order #<span class="trans_code">'.$row['trans_code'].'</span><span class="show_details" style="margin-left: 5px;"><button>Show</button></span></p>
                      <div class="order_details">
                        <p>Name: '.$row['cus_fname'].' '.$row['cus_lname'].'</p>
                        <p>Address: '.$row['cus_address'].'</p>
                        <p>Contact: '.$row['cus_cont'].'</p>
                        <p>Item Ordered: '.$row['item'].'</p>
                        <p>Size: '.$row['size'].'</p>
                        <p>Quantity: '.$row['order_quant'].'</p>
                        <p>Price: '.$row['prod_price'].'</p>
                        <p>Total: '.$row['order_total'].'</p>
                        <p>Status: '.$row['order_stat'].'</p>
                        <p>Date: '.$row['order_date'].'</p>
                      </div>
                      <button class="confirm cancel">Confirm Order</button>
                      </div>';
      }
    }
    
  }
} else {
  $output = "No orders yet.";
}
echo $output;
?>