<?php
session_start();
include_once 'config.php';
$loginSeller = new Conn();
$uname = $_POST['uname'];
$pword = $_POST['pword'];
if (!empty($uname) && !empty($pword)) {
  $validateCred = $loginSeller->getSellerCred($uname, $pword);
  if ($validateCred->rowCount() > 0) {
    foreach ($validateCred as $row) {
      if($row['blocked'] == '0') {
        $_SESSION['seller_id'] = $row['seller_id'];
        echo "success";
      } else {
        echo "Account blocked.";
      }
    }
  } else {
    echo 'Invalid username or password.';
  }
} else {
  echo "All fields are required.";
}
?>