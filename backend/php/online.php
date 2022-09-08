<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php';
$mail = new PHPMailer(true);
session_start();
include_once 'config.php';
require 'creds.php';
date_default_timezone_set("Asia/Manila");
parse_str($_POST['formData'], $output);
$insertOrder = new Conn();
$trans_code = rand(100000, 1000000);
$date = date("d-M-Y -- h:i A");
$status = "Pending";
$payment = "Online Payment";
$getcusEmail = $insertOrder->getCustomerUID($_SESSION['customer_id']);
foreach ($getcusEmail as $row) {
  $cus_email = $row['email'];
}
// $insertAndDeduct = $insertOrder->loadAllFromCart($output['cart_id']);
// foreach($insertAndDeduct as $row) {
//   $insertOrder->insertOrder($trans_code, $row['size'], $date, $row['quant'], $row['total'], $status, $payment, $row['product_id'], $row['seller_id'], $_SESSION['customer_id']);
//   $insertOrder->decrementQuant($row['quant'], $row['product_id']);
// }
// $deleteCart = $insertOrder->deleteSingleCart($output['cart_id']);
// if($deleteCart) {
//   try {
//     $body = '<h2>Thank you for ordering, please wait for the seller to confirm your order.</h2>';
//     $altBody = 'Thank you for ordering, please wait for the seller to confirm your order.';
//     $mail->SMTPDebug = 3;
//     $mail->isSMTP();
//     $mail->Host = "smtp.gmail.com";
//     $mail->SMTPAuth = true;
//     $mail->Username = USER;
//     $mail->Password = PASS;
//     $mail->SMTPSecure = "tls";
//     $mail->Port = 587;
//     $mail->setFrom("ilocolokal@gmail.com", "ILOCOLOKAL");
//     $mail->addAddress($cus_email);
//     $mail->isHTML();
//     $mail->Subject = "New Order!";
//     $mail->Body = $body;
//     $mail->AltBody = $altBody;
  
//     $mail->send();
//   } catch (Exception $e) {
//     echo "Mailer error" . $mail->ErrorInfo;
//   }
// }
$insertAndDeduct = $insertOrder->loadCartCopy($_SESSION['customer_id']);
if($insertAndDeduct->rowCount() > 0) {
  foreach ($insertAndDeduct as $row) {
    $insertOrder->insertOrder($trans_code, $row['size'], $date, $row['quant'], $row['total'], $status, $payment, $row['product_id'], $row['seller_id'], $_SESSION['customer_id']);
    $insertOrder->decrementQuant($row['quant'], $row['product_id']);
  }
}
$deleteCart = $insertOrder->removeAllCart($_SESSION['customer_id']);
if($deleteCart) {
  try {
    $body = '<h2>Thank you for ordering, please wait for the seller to confirm your order.</h2>';
    $altBody = 'Thank you for ordering, please wait for the seller to confirm your order.';
    $mail->SMTPDebug = 3;
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = USER;
    $mail->Password = PASS;
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->setFrom("ilocolokal@gmail.com", "ILOCOLOKAL");
    $mail->addAddress($cus_email);
    $mail->isHTML();
    $mail->Subject = "New Order!";
    $mail->Body = $body;
    $mail->AltBody = $altBody;
  
    $mail->send();
  } catch (Exception $e) {
    echo "Mailer error" . $mail->ErrorInfo;
  }
}
?>
