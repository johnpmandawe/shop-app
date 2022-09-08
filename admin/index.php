<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../frontend/style/common.css">
  <link rel="stylesheet" href="../frontend/style/admin.css">
  <title>Admin</title>
</head>
<body>
  <div class="login_div">
    <h1>Admin Login</h1>
    <form action="#" class="admin_login_form" method="POST">
      <input type="text" name="uname" placeholder="Username" class="input_field"/>
      <input type="password" name="pword" placeholder="Password" class="input_field"/>
      <input type="submit" class="btn" value="Login">
    </form>
  </div>
  <script src="../backend/js/jquery-3.6.0.min.js"></script>
  <script src="../backend/js/admin.js"></script>
</body>
</html>