<?php 
session_start();
include_once 'config.php';
$loadSellerData = new Conn();
$load = $loadSellerData->getSellerName($_SESSION['seller_id']);
foreach ($load as $row) {
  if ($row['gender'] == "Male") {
    echo '<div class="input_group flex">
            <input type="text" name="fname" class="input_field" value="'.$row['fname'].'"/>
            <input type="text" name="mname" class="input_field" value="'.$row['mname'].'"/>
          </div>
          <div class="input_group flex">
            <input type="text" name="lname" class="input_field" value="'.$row['lname'].'"/>
            <div class="gender_field flex">
              <div class="genders">
                <input type="radio" name="gender" value="Male" checked required/> Male
              </div>
              <div class="genders">
                <input type="radio" name="gender" value="Female" required/> Female
              </div>
            </div>
          </div>
          <div class="input_group flex">
            <input type="email" name="email" class="input_field" value="'.$row['email'].'"/>
            <input type="text" name="cont" class="input_field" value="'.$row['cont'].'"/>
          </div>
          <div class="input_group flex">
            <input type="text" name="address" class="input_field" value="'.$row['address'].'""/>
            <input type="text" name="uname" class="input_field" value="'.$row['uname'].'"/>
          </div>';
  } else {
    echo '<div class="input_group flex">
            <input type="text" name="fname" class="input_field" value="'.$row['fname'].'"/>
            <input type="text" name="mname" class="input_field" value="'.$row['mname'].'"/>
          </div>
          <div class="input_group flex">
            <input type="text" name="lname" class="input_field" value="'.$row['lname'].'"/>
            <div class="gender_field flex">
              <div class="genders">
                <input type="radio" name="gender" value="Male" required/> Male
              </div>
              <div class="genders">
                <input type="radio" name="gender" value="Female" checked required/> Female
              </div>
            </div>
          </div>
          <div class="input_group flex">
            <input type="email" name="email" class="input_field" value="'.$row['email'].'"/>
            <input type="text" name="cont" class="input_field" value="'.$row['cont'].'"/>
          </div>
          <div class="input_group flex">
            <input type="text" name="address" class="input_field" value="'.$row['address'].'""/>
            <input type="text" name="uname" class="input_field" value="'.$row['uname'].'"/>
          </div>';
  }
}
?>