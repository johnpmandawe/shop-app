<?php 
session_start();
include_once 'config.php';
parse_str($_POST['formData'], $output);
$getEmail = new Conn();
if (filter_var($output['email'], FILTER_VALIDATE_EMAIL)) {
  $getSellerEmail = $getEmail->getSellerEmail($output['email']);
  $getCustomerEmail = $getEmail->getCusEmail($output['email']);
  if ($getSellerEmail->rowCount() > 0) {
    foreach($getSellerEmail as $row) {
      $_SESSION['seller_email'] = $row['email'];
    }
    echo 'seller';
  }
  else if ($getCustomerEmail->rowCount() > 0) {
    foreach($getCustomerEmail as $row) {
      $_SESSION['customer_email'] = $row['email'];
    }
    echo 'customer';
  }
  else {
    echo 'Email does not exist.';
  }
} else {
  echo "Invalid email format.";
}
// if ($get->rowCount() > 0) {
//   foreach ($get as $row) {
//     $_SESSION['email'] = $row['email'];
//     echo 'success';
//   }
// } else {
//   echo 'Email does not exist';
// }
?>