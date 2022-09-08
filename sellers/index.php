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
    <div class="seller_nav flex">
      <h1>Welcome!</h1>
      <div class="seller_name_wrapper">
        <div class="seller_logo">
        </div>
        <ul class="seller_menu flex">
          <li><a href="#" id="edit_profile">Edit Profile</a></li>
          <li><a href="manage_orders/">Manage Orders</a></li>
          <li><a href="#" id="logout">Logout</a></li>
        </ul>
      </div>
    </div>
    <div class="products_wrapper">
      <div class="manage_btn flex">
        <p class="manage_prod_text">YOUR SHOP</p>
        <img src="../frontend/images/add.png" class="add_btn" alt="">
      </div>
      <div class="load_products flex">
        <p class="load_prod_text"></p>
      </div>
      <div class="zoom"><span class="close">&times;</span></div>
    </div>
    <!-- MODALS FOR PRODUCT MANAGEMENT -->
    <!-- ADD NEW PRODUCT MODAL -->
    <div class="modal new_prod">
      <div class="modal_content">
        <p class="modal_title">ADD NEW PRODUCT</p>
        <div class="add_prod_err msg">this is error message</div>
        <form action="#" method="POST" enctype="multipart/form-data" class="new_prod_form">
          <p style="margin-bottom: 10px;">Upload product image:</p>
          <input type="file" name="image" style="margin-bottom: 10px;"/>
          <input type="text" name="prod_name" placeholder="Product name" class="input_field prod_field"/>
          <input type="number" name="prod_stock" placeholder="Product stock" class="input_field prod_field"/>
          <input type="number" name="prod_price" placeholder="Product price" class="input_field prod_field"/>
          <div class="btn_field prod_btn_field flex">
          
            <input type="submit" class="add_prod_btn btn" value="Add">
            <input type="reset" class="exit btn" value="Cancel">
          </div>
        </form>
      </div>
    </div>
    <!-- UPDATE PRODUCT MODAL -->
    <div class="modal update_prod">
      <div class="modal_content">
        <p class="modal_title">UPDATE PRODUCT</p>
        <div class="update_prod_err msg"></div>
        <div class="update_prod_suc suc msg"></div>
        <form action="#" method="POST" enctype="multipart/form-data" class="update_prod_form">
          <p style="margin-bottom: 10px;">Upload product image:</p>
          <div class="seller_update">
          </div>
          <div class="btn_field prod_btn_field flex">
          
            <input type="submit" class="update_prod_btn btn" value="Update">
            <input type="reset" class="exit btn" value="Cancel">
          </div>
        </form>
      </div>
    </div>
    <!-- UPDATE SELLER PROFILE MODAL -->
    <div class="modal update_seller">
      <div class="modal_content">
        <p class="modal_title">UPDATE PROFILE</p>
        <div class="seller_update_err err msg"></div>
        <div class="seller_update_suc suc msg"></div>
        <form action="#" method="POST" class="seller_update_form">
          <p>Upload Logo (optional)</p>
          <input type="file" name="image">
          <div class="load_seller">
          </div>
          <div class="btn_field flex">
            <input type="submit" class="seller_update_btn btn" value="Update"/>
            <input type="reset" class="exit btn" value="Cancel"/>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script src="../backend/js/jquery-3.6.0.min.js"></script>
  <script src="../backend/js/sellers_modals.js"></script>
  <script src="../backend/js/sellers_load_prod.js"></script>
  <script src="../backend/js/seller_prod_eh.js"></script>
  
</body>
</html>