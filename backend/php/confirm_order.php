<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'creds.php';
require '../../vendor/autoload.php';
$mail = new PHPMailer(true);
include_once 'config.php';
$updateStatus = new Conn();
$trans_code = $_POST['trans_code'];
$date = "";
$status = "";
$payment = "";
$cus_unique_id = 0;
$cus_email = "";
$items = '';
$total_quant = 0;
$sizes = '';
$total_amount = 0;
$cus_email = "";
$update = $updateStatus->updateORderStatus($trans_code);
$getCusId = $updateStatus->getCusEmailViaTransCode($trans_code);
foreach ($getCusId as $row) {
  $cus_unique_id = $row['customer_id'];
}
$getCusEmail = $updateStatus->getCustomerUID($cus_unique_id);
foreach ($getCusEmail as $row1) {
  $cus_email = $row1['email'];
}
$getAllItems = $updateStatus->getAllOrders($trans_code);
foreach ($getAllItems as $row) {
  $items = $row['item'];
  $total_quant = $row['quant'];
  $sizes = $row['size'];
  $total_amount = $row['total'];
  $date = $row['date'];
  $payment = $row['payment'];
  $status = $row['status'];

}
if ($update) {
  try {
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
    $mail->Subject = "Order Confirmation";
    $mail->Body = '<h3>Order Details</h3>
                   <p>Item: '.$items.'</p>
                   <p>Size: '.$sizes.'</p>
                   <p>Quantity: '.$total_quant.'</p>
                   <p>Amount: '.$total_amount.'</p>
                   <p>Status: '.$status.'</p>
                   <p>Date: '.$date.'</p>
                   <p>Payment Method: '.$payment.'</p>
                   <p>Order has been confirmed by the seller. Thank you!</p>';
    $mail->AltBody = 'Order Details:\n
                      Item: '.$items.'\n
                      Size: '.$sizes.'\n
                      Quantity: '.$total_quant.'\n
                      Total: '.$total_amount.'\n
                      Status: '.$status.'\n
                      Date: '.$date.'\n
                      Payment Method: '.$payment.'\n
                      Order has been confirmed by the seller. Thank you!';
    if($mail->send()) {
      echo 'success';
      $mail->clearAddresses();
    }
  } catch (Exception $e) {
    echo $mail->ErrorInfo;
  }
} else {
  echo 'failed';
}
?>