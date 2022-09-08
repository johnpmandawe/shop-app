<?php
session_start();
include_once 'config.php';
$login = new Conn();
parse_str($_POST['formData'], $output);
if (!empty($output['uname']) && !empty($output['pword'])) {
  $cusLogin = $login->getCusCred($output['uname'], $output['pword']);
  $selLogin = $login->getSellerCred($output['uname'], $output['pword']);
  if($cusLogin->rowCount() > 0) {
    foreach($cusLogin as $row) {
      if ($row['blocked'] == 0) {
        $_SESSION['customer_id'] = $row['customer_id'];
        echo 'customer';
      } else {
        echo 'Account blocked.';
      }
    }
  }
  else if($selLogin->rowCount() > 0) {
    foreach($selLogin as $row) {
      if($row['blocked'] == 0) {
        $_SESSION['seller_id'] = $row['seller_id'];
        echo 'seller';
      } else {
        echo 'Account blocked.';
      }
    }
  }
  else {
    echo 'Invalid username or password.';
  }
} else {
  echo 'All fields are required.';
}
?>