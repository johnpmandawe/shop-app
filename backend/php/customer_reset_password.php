<?php 
session_start();
include_once 'config.php';
$resetPass = new Conn();
parse_str($_POST['formData'], $output);
if (!empty($output['pass1']) && !empty($output['pass2'])) {
  if ($output['pass1'] === $output['pass2']) {
    if (strlen($output['pass1']) >= 8 && strlen($output['pass2']) >= 8) {
      $curr_pass = $resetPass->getCustomerPassword($_SESSION['customer_email']);
      if($output['pass2'] != $curr_pass) {
        $reset = $resetPass->resetCusPass($output['pass2'], $_SESSION['customer_email']);
        if ($reset) {
          unset($_SESSION['customer_email']);
          session_destroy();
          echo 'success';
        } else {
          echo 'Something went wrong.';
        }
      } else {
        echo 'New password cannot be the same as the old one.';
      }
    } else {
      echo 'Password must be 8 characters and above.';
    }
  } else {
    echo "Passwords didn't match.";
  }
} else {
  echo "All fields are required.";
}
?>