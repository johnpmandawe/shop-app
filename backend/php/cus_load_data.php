<?php
session_start();
include_once 'config.php';
$cusLoadData = new Conn();
$output = '';
$get = $cusLoadData->getCustomerUID($_SESSION['customer_id']);
if ($get->rowCount() > 0) {
  foreach ($get as $row) {
    $output = '<input type="text" name="fname" value="'.$row['fname'].'" class="inputs"/>
                <input type="text" name="mname" value="'.$row['mname'].'" class="inputs"/>
                <input type="text" name="lname" value="'.$row['lname'].'" class="inputs"/>
                <input type="text" name="gender" value="'.$row['gender'].'" class="inputs"/>
                <input type="text" name="email" value="'.$row['email'].'" class="inputs"/>
                <input type="text" name="cont" value="'.$row['cont'].'" class="inputs"/>
                <input type="text" name="address" value="'.$row['address'].'" class="inputs"/>
                <input type="text" name="uname" value="'.$row['uname'].'" class="inputs"/>';
  }
} else {
  echo 'Something went wrong.';
}
echo $output;
?>