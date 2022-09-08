<?php include 'security.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../frontend/style/common.css">
  <link rel="stylesheet" href="../../frontend/style/admin_dashboard.css">
  <title>Dashboard</title>
</head>
<body>
  <div class="wrapper flex">
    <div class="sellers_account">
      <h1>Seller Accounts</h1>
      <div class="load_sellers">

      </div>
    </div>
    <div class="customers_account">
      <h1>Customer Accounts</h1>
      <div class="load_customers">

      </div>
    </div>
  </div>
  <img src="../../frontend/images/logout.png" class="logout" alt="">
  <script src="../../backend/js/jquery-3.6.0.min.js"></script>
  <script src="../../backend/js/admin_dashboard.js"></script>
</body>
</html>