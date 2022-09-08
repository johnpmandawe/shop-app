<?php 
include_once 'config.php';
$insertSellers = new Conn();
$address_arr = ["Ajuy", "Alimodian", "Anilao", "Badiangan", "Balasan", "Banate", "Barotac Nuevo", "Barotac Viejo", "Batad", "Bingawan", 
            "Cabatuan", "Calinog", "Carles", "Concepcion", "Dingle", "Duenas", "Dumangas", "Estancia", "Guimbal", "Igbaras", 
            "Janiuay", "Lambunao", "Leganes", "Lemery", "Leon", "Maasin", "Miag-ao", "Mina", "New Lucena", "Oton", 
            "Passi", "Pavia", "Pototan", "San Dionisio", "San Enrique", "San Joaquin", "San Miguel", "San Rafael", "Santa Barbara", "Sara", 
            "Tigbauan", "Tubungan", "Zarraga"];
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
$flag = 0;
if ( !empty($fname) && !empty($mname) && !empty($lname) && !empty($gender) && !empty($email) && !empty($cont) && !empty($address) && !empty($uname) && !empty($pword) && !empty($conpword)) {
  if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // If email is valid
    if (strlen($cont) < 11 || strlen($cont) > 11) { // If contact number is valid 
      echo "Contact number must be 11 characters.";
    } else {
      if (strlen($pword) < 8 && strlen($conpword) < 8) { // If password greater than or equal to 8
        echo 'Password must be 8 characters and above';
      } else {
        if ($pword == $conpword) { // If password is equal to confirm password
          if ($insertSellers->getSellerEmails($email) > 0) { // If email already exist
            echo 'Email already exists.';
          } else {
            $exp_add = explode(', ', $address);
            for ($i=0; $i < count($exp_add); $i++) { 
              if(in_array($exp_add[$i], $address_arr)) {
                $flag ++;
              }
            }
            if($flag > 0) { // If address is valid
              if ($_FILES['logo']['name'] != "") { // If file is uploaded
                $extensions = ['jpeg', 'png', 'jpg'];
                $img_name = $_FILES['logo']['name'];
                $tmp_name = $_FILES['logo']['tmp_name'];
                $exploded = explode('.', $img_name);
                $ext = end($exploded);
                if (in_array($ext, $extensions) === true) {
                  $time = time();
                  $new_image_name = $time.$img_name;
                  if (move_uploaded_file($tmp_name, '../../sellers/seller_logo/'.$new_image_name)) {
                    $unique_id = rand(1000, 10000);
                    $insert = $insertSellers->insertSellers($unique_id, $new_image_name, $fname, $mname, $lname, $gender, $email, $cont, $address, $uname, $pword); // Insert seller command/query
                    if ($insert) {
                      echo 'success';
                    } else {
                      echo 'Something went wrong.';
                    }
                  } else {
                    echo "Can't complete the action.";
                  } 
                } else {
                  echo 'Please select an image file - jpg, png, jpeg.';
                }
              } else {
                $default_logo = "logo.png";
                $unique_id1 = rand(1000, 10000);
                $insert1 = $insertSellers->insertSellers($unique_id1, $default_logo, $fname, $mname, $lname, $gender, $email, $cont, $address, $uname, $pword);
                if ($insert1) {
                  echo 'success';
                } else {
                  echo 'Something went wrong.';
                }
              }
            } else {
              echo 'Incorrect address.';
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