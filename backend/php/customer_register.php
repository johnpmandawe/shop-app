<?php 
include_once 'config.php';
$insertSellers = new Conn();
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$cont = $_POST['cont'];
$address = $_POST['address'];
$uname = $_POST['uname'];
$pword = $_POST['pword'];
$conpword = $_POST['conpword'];
if ( !empty($fname) && !empty($mname) && !empty($lname) && !empty($gender) && !empty($email) && !empty($cont) && !empty($address) && !empty($uname) && !empty($pword) && !empty($conpword) ) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    if (strlen($cont) < 11 || strlen($cont) > 11) {
      echo "Contact number must be 11 characters.";
    } else {
      if (strlen($pword) < 8 && strlen($conpword) < 8) {
        echo 'Password must be 8 characters and above';
  
      } else {
  
        if ($pword == $conpword) {
  
          if ($insertSellers->getCustomerEmails($email) > 0) {
        
            echo 'Email already exists.';
        
          } else {
            $unique_id = rand(100, 10000);
  
            $insert = $insertSellers->insertCustomers($unique_id, $fname, $mname, $lname, $gender, $email, $cont, $address, $uname, $pword);
  
            if ($insert) {
        
              echo 'success';
  
            }
        
          }
        
        } else {
        
          echo "Passwords didn't match.";
        
        }
  
      }
    }
  } else {
    echo "Invalid email format.";
  }
} else {
  echo "All fields are required.";
}
?>