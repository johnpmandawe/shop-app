<?php 
session_start();
include_once 'config.php';
$updateProfile = new Conn();
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$cont = $_POST['cont'];
$address = $_POST['address'];
$uname = $_POST['uname'];
if (!empty($fname) && !empty($mname) && !empty($lname) && !empty($gender) && !empty($email) && !empty($cont) && !empty($address) && !empty($uname)) {
  if ($_FILES['image']['name'] == "") {
    $update = $updateProfile->updateSellerProfile($fname, $mname, $lname, $gender, $email, $cont, $address, $uname, $_SESSION['seller_id']);
    if ($update) {
      echo 'success';
    } else {
      echo 'failed';
    }
  } else {
    $extensions = ['jpeg', 'png', 'jpg'];
    $img_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $exploded = explode('.', $img_name);
    $ext = end($exploded);
    if (in_array($ext, $extensions) === true) {
      $time = time();
      $new_image_name = $time.$img_name;
      if (move_uploaded_file($tmp_name, '../../sellers/seller_logo/'.$new_image_name)) {
          
        $withImage = $updateProfile->updateSellerProfileWithImage($new_image_name, $fname, $mname, $lname, $gender, $email, $cont, $address, $uname, $_SESSION['seller_id']);
        if ($withImage) {
            echo 'success';
        } else {
          echo 'Something went wrong.';
        }
      }
    } else {
      echo 'Please select an image file - jpg, png, jpeg.';
    }
  }
} else {
  echo 'All fields are required.';
}
?>