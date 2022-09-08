<?php include 'security.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../frontend/style/common.css">
  <link rel="stylesheet" href="../frontend/style/style.css">
  <title>Dashboard</title>
</head>
<body>
  <div class="wrapper">
    <div class="customer_nav flex">
      <div class="logo_wrapper cus_logo_wrapper">
        <a href="../customers/"><img src="../frontend/images/logo.png" class="logo" alt=""></a>
      </div>
      <h2>ILOCOLOKAL CLOTHING WEBSITE</h2>
      <div class="substitute"></div>
      <ul class="customer_menu flex">
        <li><a href="#shops"><img src="../frontend/images/shop.png" class="menu_icons active" alt=""> </a></li>
        <li><a href="#cart"><img src="../frontend/images/shopping-cart.png" class="menu_icons" alt=""> </a></li>
        <li><a href="#orders"><img src="../frontend/images/history.png" class="menu_icons" alt=""> </a></li>
        <li><a href="#account"><img src="../frontend/images/portrait.png" class="menu_icons" alt=""> </a></li>
      </ul>
    </div>
    <div class="pages_wrapper">
      <div class="page" id="shops">
        <div class="centered">
          <div class="shops_search flex">
            <h2>SHOPS</h2>
            <input type="text" name="search" placeholder="Search here..." class="search"/>
          </div>
          <div class="shops_content flex">
            <div class="shop_dropdown_wrapper">
              <button class="show_shops">Show Shops</button>
              <div class="shop_dropdown">
              </div>
            </div>
            <div class="load_shops w75 flex">
            </div>
          </div>
        </div>
      </div>
      <div class="page" id="orders">
        <div class="centered">
          <h2>ORDERS</h2>
          <div class="order_content">
            <div class="load_orders flex">
            </div>
          </div>
        </div>
      </div>
      <div class="page" id="cart">
        <div class="centered">
          <div class="cart_checkout flex">
            <div class="cart_group_by flex">
              <h2>CART</h2>
              <div class="group_by_checkbox flex">
              </div>
            </div>
            <button class="cart_btn_checkout cbtn">Checkout</button>
          </div>
          <div class="cart_content flex">
          
          </div>
        </div>
      </div>
      <div class="page" id="account">
        <div class="centered">
          <h2>ACCOUNT</h2>
          <div class="account_content flex">
            <form action="#" method="POST" class="cus_profile_form">
              <h2>PROFILE</h2>
              <div class="msg err cus_update_err_msg"></div>
              <div class="msg suc cus_update_suc_msg"></div>
              <div class="load_cus_data">
              </div>
              <input type="submit" class="cus_update_btn" value="Update Profile">
            </form>
            <button class="cus_logout">Logout</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal cancel_modal">
    <div class="modal_content">
      <p class="modal_title">Cancel Order</p>
      <p class="cancel_text suc">Do you want to cancel your order?</p>
      <div class="btn_field flex">
        <div class="hidden_inputs" style="display: none;">
        </div>
        <button class="yes">Yes</button>
        <button class="no">No</button>
      </div>
    </div>
  </div>
  <!-- PAYMENT MODAL -->
  <div class="modal payment">
    <div class="modal_content">
      <p class="modal_title">SELECT PAYMENT METHOD</p>
      <form action="#" id="order_details" method="POST" style="display: none;">
        <div class="load_here">
        </div>
      </form>
      <form action="#" class="payment_form" method="POST">
        <select class="selection">
          <option value="">---</option>
          <option value="cod">COD</option>
          <option value="online">Online Payment</option>
        </select>
        <input type="submit" class="payment_btn" value="Confirm"/>
        <input type="reset" class="cancel exit payment_cancel" value="Cancel"/>
      </form>
      <div id="smart-button-container">
        <div style="text-align: center;">
          <div id="paypal-button-container"></div>
        </div>
      </div>
    </div>
  </div>
  <!-- TRANSACTION SUCCESS MODAL -->
  <div class="modal trans_success">
    <div class="modal_content">
      <p class="modal_title">Transaction Success!</p>
      <p class="trans_msg suc">Expect an email afterwards and please wait for the seller to confirm your order. Thank you!</p>
      <button class="ok">Exit</button>
    </div>
  </div>
  <script src="../backend/js/jquery-3.6.0.min.js"></script>
  <script src="../backend/js/customers.js"></script>
  <script src="https://www.paypal.com/sdk/js?client-id=AaJyWMveyIl80oFHN5yp3RJAu7Js_yFUzca0YquQm4QMGZqpHCrF1PS7BMjvm1cleICLdWqRF5OGG3r-" data-sdk-integration-source="button-factory"></script>
  <script>
    function initPayPalButton() {
      paypal.Buttons({
        style: {
          shape: 'pill',
          color: 'gold',
          layout: 'vertical',
          label: 'paypal',
          
        },

        createOrder: function(data, actions) {
          return actions.order.create({
            purchase_units: [{"amount":{"currency_code":"USD","value":((document.querySelector('.total').value)/50)}}]
          });
        },

        onApprove: function(data, actions) {
          return actions.order.capture().then(function() {
            document.querySelector('.payment').classList.remove('modal_show');
            document.querySelector('.trans_success').classList.add('modal_show');
            let formData = $('#order_details').serialize();
            $.ajax({
              method: 'POST',
              url: '../backend/php/online.php',
              data: {
                'formData': formData
              },
              success: function (response) {
                console.log(response);
              }
            });
            // Full available details
            // console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            // Or go to another URL:  actions.redirect('thank_you.html');
            
          });
        },

        onError: function(err) {
          console.log(err);
        }
      }).render('#paypal-button-container');
    }
    initPayPalButton();
  </script>
</body>
</html>