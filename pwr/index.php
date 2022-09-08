<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../frontend/style/resets.css">
  <title>Reset Password</title>
</head>
<body>
  <div class="wrapper">
    <h2>PASSWORD RESET</h2>
    <div class="content">
      <form action="#" method="POST" class="email_submit">
        <div class="primary_msg error_msg"></div>
        <input type="email" class="input_field" name="email" placeholder="Enter Email"/>
        <input type="submit" class="submit_email btn" value="Submit">
      </form>
    </div>
    <div class="hidden_content content">
      <form action="#" method="POST" class="reset_form">
        <div class="hidden_error_msg error_msg"></div>
        <div class="hidden_success_msg"></div>
        <input type="password" class="input_field" name="pass1" placeholder="New Password"/>
        <input type="password" class="input_field" name="pass2" placeholder="Confirm Password"/>
        <input type="submit" class="hidden_btn btn" value="Reset Now">
      </form>
    </div>
  </div>
  <script src="../backend/js/jquery-3.6.0.min.js"></script>
  <script src="../backend/js/reset_password.js"></script>
</body>
</html>