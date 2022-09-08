<?php 
session_start();
include_once 'config.php';
$getAdminDetails = new Conn();
parse_str($_POST['formData'], $output);
$get = $getAdminDetails->getAdminDetails($output['uname'], $output['pword']);
if ($get->rowCount() > 0) {
  foreach ($get as $row) {
    $_SESSION['admin_id'] = $row['admin_id'];
  }
  echo 'success';
} else {
  echo 'failed';
}
?>