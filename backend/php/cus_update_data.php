<?php 
session_start();
include_once 'config.php';
$cusUpdateData = new Conn();
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$cont = $_POST['cont'];
$address = $_POST['address'];
$uname = $_POST['uname'];
if (!empty($fname) && !empty($mname) && !empty($lname) && !empty($gender) && !empty($email) && !empty($cont) && !empty($address) && !empty($uname)) {
  $update = $cusUpdateData->updateCustomerProfile($fname, $mname, $lname, $gender, $email, $cont, $address, $uname, $_SESSION['customer_id']);
  if ($update) {
    echo 'success';
  }
} else {
  echo 'All fields are required.';
}
?>