<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="frontend/style/common.css">
  <link rel="stylesheet" href="frontend/style/style.css">
  <title>Landing Page</title>
</head>
<body>
  <div class="wrapper">
    <!-- NAV AREA -->
    <div class="nav flex">
      <input type="checkbox" id="check">
      <label for="check">
        <span class="line one"></span>
        <span class="line two"></span>
        <span class="line three"></span>
      </label>
      <div class="logo_wrapper">
        <a href="index.php"><img src="frontend/images/logo.png" class="logo" alt=""></a>
      </div>
      <ul class="menu flex">
        <div class="left flex">
          <li><a href="#banner">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#contact">Contact</a></li>
        </div>
        <div class="right flex">
          <div class="login">
            Login
            <ul class="dropdown drp_lgn">
              <li class="drp_log_seller">Seller</li>
              <li class="drp_log_customer">Customer</li>
            </ul>
          </div>
          <div class="register">
            Register
            <ul class="dropdown drp_rgt">
              <li class="drp_reg_seller">Seller</li>
              
              <li class="drp_reg_customer">Customer</li>
            </ul>
          </div>
        </div>
      </ul>
    </div>
    <!-- BANNER AREA -->
    <div class="banner_area flex" id="banner">
      <div class="web_name">
        <p>ILOCOLOKAL Clothing Website</p>
      </div>
      <div class="seller_logo_wrapper flex">
      </div>
    </div>
    <!-- ABOUT AREA -->
    <div class="about_area flex" id="about">
      <div class="centered">
        <p class="about_title">About Us</p>
        <p class="about_content">
          To promote and support local products. Most entrepreneurs are
          having a hard time in establishing a marketing strategy
          since there are many competitors. So we developed
          this clothing line system to help those local entrepreneurs
          to advertise their products through a website that
          can help to be more convenient and efficient not
          just for the entrepreneurs but also for the customers.
          We aim to help the local entrepreneurs to promote their
          products and we hope that in the future,
          this local clothing line will rise and known around the world.
        </p>
      </div>
    </div>
    <!-- CONTACT AREA -->
    <div class="contact_area flex" id="contact">
      <div class="centered">
        <p class="contact_title">Email Us</p>
        <form action="#" method="POST" class="cont_form">
          <input type="text" name="Name" placeholder="Name" class="con_field" required/>
          <input type="email" name="Email" placeholder="Email" class="con_field" required/>
          <textarea name="Message" placeholder="Message" class="con_field con_msg" required></textarea>
          <input type="submit" class="con_btn" value="Send"/>
        </form>
      </div>
    </div>
    <!-- FOOTER AREA -->
    <div class="footer_area">
      <p class="footer_text"><span>&copy;</span> 2022. ilocolokal.com. All Rights Reserved.</p>
    </div>
    <!-- MODALS -->
    <!-- SELLER REGISTRATION MODAL -->
    <div class="modal seller_reg">
      <div class="modal_content" id="seller_reg">
        <p class="modal_title">SELLER REGISTRATION</p>
        <div class="seller_err_msg err msg"></div>
        <div class="seller_suc_msg suc msg"></div>
        <form action="#" method="POST" class="seller_reg_form">
          <div class="logo_field">
            <p>Upload Business Logo (optional)</p>
            <input type="file" name="logo"/>
          </div>
          <div class="input_group flex">
            <input type="text" name="fname" class="input_field" placeholder="First name"/>
            <input type="text" name="address" class="input_field" placeholder="Barangay, Municipality, Province"/>
          </div>
          <div class="input_group flex">
            <input type="text" name="mname" class="input_field" placeholder="Middle name"/>
            <input type="number" name="cont" class="input_field" placeholder="Contact number"/>
          </div>
          <div class="input_group flex">
            <input type="text" name="lname" class="input_field" placeholder="Last name"/>
            <input type="text" name="uname" class="input_field" placeholder="Username"/>
          </div>
          <div class="input_group flex">
            <input type="email" name="email" class="input_field" placeholder="Email"/>
            <input type="password" name="pword" class="input_field" placeholder="Password"/>
          </div>
          <div class="input_group flex">
            <div class="gender_field flex">
              <div class="genders">
                <input type="radio" name="gender" value="Male" checked required/> Male
              </div>
              <div class="genders">
                <input type="radio" name="gender" value="Female" required/> Female
              </div>
            </div>
            <input type="password" name="conpword" class="input_field" placeholder="Confirm Password"/>
          </div>
          <div class="btn_field flex">
            <input type="submit" class="seller_reg_btn btn" value="Register"/>
            <input type="reset" class="exit btn" value="Cancel"/>
          </div>
        </form>
      </div>
    </div>
    <!-- CUSTOMER REGISTRATION MODAL -->
    <div class="modal customer_reg">
      <div class="modal_content" id="customer_reg">
        <p class="modal_title">CUSTOMER REGISTRATION</p>
        <div class="customer_err_msg err msg"></div>
        <div class="customer_suc_msg suc msg"></div>
        <form action="#" method="POST" class="customer_reg_form">
          <div class="input_group flex">
            <input type="text" name="fname" class="input_field" placeholder="First name"/>
            <input type="text" name="address" class="input_field" placeholder="Address"/>
          </div>
          <div class="input_group flex">
            <input type="text" name="mname" class="input_field" placeholder="Middle name"/>
            <input type="number" name="cont" class="input_field" placeholder="Contact number"/>
          </div>
          <div class="input_group flex">
            <input type="text" name="lname" class="input_field" placeholder="Last name"/>
            <input type="text" name="uname" class="input_field" placeholder="Username"/>
          </div>
          <div class="input_group flex">
            <input type="email" name="email" class="input_field" placeholder="Email"/>
            <input type="password" name="pword" class="input_field" placeholder="Password"/>
          </div>
          <div class="input_group flex">
            <div class="gender_field flex">
              <div class="genders">
                <input type="radio" name="gender" value="Male" checked required/> Male
              </div>
              <div class="genders">
                <input type="radio" name="gender" value="Female" required/> Female
              </div>
            </div>
            <input type="password" name="conpword" class="input_field" placeholder="Confirm Password"/>
          </div>
          <div class="btn_field flex">
            <input type="submit" class="customer_reg_btn btn" value="Register"/>
            <input type="reset" class="exit btn" value="Cancel"/>
          </div>
        </form>
      </div>
    </div>
    <!-- LOGIN MODAL -->
    <div class="modal user_login">
      <div class="modal_content">
        <p class="modal_title">Login</p>
        <div class="seller_log_err_msg msg err"></div>
        <form action="#" method="POST" class="log_form">
          <input type="text" name="uname" placeholder="Username" class="l_input_field"/>
          <div class="pw_eye_wrapper">
            <input type="password" name="pword" placeholder="Password" class="sel_pass_field l_input_field"> 
            <img src="frontend/images/eye.png" class="eye seller_eye" alt="">
          </div>
          <div class="log_btn_field flex">
            <input type="submit" class="log_btn l_btn" value="Login">
            <input type="reset" class="exit l_btn" value="Cancel">
          </div>
        </form>
        <div class="fp_wrapper">
          <a href="pwr/" class="forgot_pass">Forgot password?</a>
        </div>
      </div>
    </div>
  </div>
  <script src="backend/js/jquery-3.6.0.min.js"></script>
  <script src="backend/js/dropdown.js"></script>
  <script src="backend/js/modals.js"></script>
  <script src="backend/js/register_login.js"></script>
  <script src="backend/js/pass_show_hide.js"></script>
  <script src="backend/js/slideshow.js"></script>
</body>
</html>