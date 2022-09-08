<?php include 'security.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../frontend/style/common.css">
  <link rel="stylesheet" href="../frontend/style/style.css">
  <title>Shops</title>
</head>
<body>
  <div class="shops_wrapper">
    <div class="shops_nav flex">
      <div class="back_btn_wrapper flex">
        <img src="../frontend/images/left-arrow.png" class="back_btn" alt="">
      </div>
      <ul class="customer_menu flex">
        <li><a href="../customers/#shops"><img src="../frontend/images/shop.png" class="menu_icons active" alt=""> </a></li>
        <li><a href="../customers/#cart"><img src="../frontend/images/shopping-cart.png" class="menu_icons" alt=""> </a></li>
        <li><a href="../customers/#orders"><img src="../frontend/images/history.png" class="menu_icons" alt=""> </a></li>
        <li><a href="../customers/#account"><img src="../frontend/images/portrait.png" class="menu_icons" alt=""> </a></li>
      </ul>
    </div>
    <div class="load_shops_wrapper">
      <h2>ORDER NOW</h2>
      <div class="load_shops flex">
      </div>
    </div>
  </div>
  <!-- MODALS -->
  <div class="modal customer_order">
    <div class="modal_content">
      <p class="modal_title">Your Order</p>
      <div class="msg err confirm_order_err_msg"></div>
      <form action="#" method="POST" class="cus_order_form">
        <div class="load_order">
        </div>
        <div class="order_input_group flex">
          <p>Quantity: </p>
          <input type="number" name="quant" class="input_field order_quant" placeholder="Quantity" required>
        </div>
        <div class="btn_field flex">
          <input type="submit" class="btn submit_btn" value="Submit Order">
          <input type="reset" class="btn exit" value="Cancel Order">
        </div>
      </form>
    </div>
  </div>
  <div class="modal order_confirm">
    <div class="modal_content">
      <p class="modal_title">Order Details</p>
      <div class="msg suc added_msg"></div>
      <div class="msg err not_msg"></div>
      <form action="#" method="POST" class="confirm_order_form">
        <div class="load_order_details">
        </div>
        <div class="btn_field flex">
          <input type="submit" class="btn add_to_cart" value="Add to Cart">
          <input type="reset" class="btn exit" value="Cancel">
        </div>
      </form>
    </div>
  </div>
  <div class="item_zoom">
    <span class="zoom_exit">&times;</span>
  </div>
  <script src="../backend/js/jquery-3.6.0.min.js"></script>
  <script src="../backend/js/shops.js"></script>
</body>
</html>