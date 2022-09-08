window.addEventListener('pageshow', function () {
  let seller_reg_btn = document.querySelector('.seller_reg_btn'),
  customer_reg_btn = document.querySelector('.customer_reg_btn'),
  seller_reg_form = document.querySelector('.seller_reg_form'),
  customer_reg_form = document.querySelector('.customer_reg_form'),
  seller_err_msg = document.querySelector('.seller_err_msg'),
  seller_suc_msg = document.querySelector('.seller_suc_msg'),
  customer_err_msg = document.querySelector('.customer_err_msg'),
  customer_suc_msg = document.querySelector('.customer_suc_msg');
  seller_reg_form.onsubmit = (e) => {
    e.preventDefault();
  }
  customer_reg_form.onsubmit = (e) => {
    e.preventDefault();
  }
  // SELLER REGISTER
  seller_reg_btn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'backend/php/seller_register.php', true);
    xhr.onload = ()=> {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let response = xhr.response;
          if (response == "success") {
            seller_suc_msg.textContent = "Account created successfully!";
            seller_suc_msg.style.display = "block";
            seller_err_msg.style.display = "none";
            seller_reg_form.reset();
            function reLoad () {
              window.location.reload();
            }
            setTimeout(reLoad, 1000);
          } else {
            seller_err_msg.textContent = response;
  
            seller_suc_msg.style.display = "none";
  
            seller_err_msg.style.display = "block";
          }
        }
      }
    }
    let formData = new FormData(seller_reg_form);
    xhr.send(formData);
  }
  // CUSTOMER REGISTER
  customer_reg_btn.onclick = ()=> {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'backend/php/customer_register.php', true);
    xhr.onload = ()=> {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let response = xhr.response;
          if (response == "success") {
            customer_suc_msg.textContent = "Account created successfully!";
            customer_suc_msg.style.display = "block";
            customer_err_msg.style.display = "none";
            customer_reg_form.reset();
            function reLoad () {
              window.location.reload();
            }
            setTimeout(reLoad, 1000);
          } else {
            customer_err_msg.textContent = response;
  
            customer_suc_msg.style.display = "none";
  
            customer_err_msg.style.display = "block";
          }
        }
      }
    }
    let formData = new FormData(customer_reg_form);
    xhr.send(formData);
  }
  // LOGIN REQUEST CODE
  $('.log_btn').click(function () {
    let formData = $('.log_form').serialize();
    $.ajax({
      method: 'POST',
      url: 'backend/php/login.php',
      data: {'formData': formData},
      success: function (response) {
        if(response == "seller") {
          $('.log_form').trigger('reset');
          $('.log_err_msg').css('display', 'none');
          $('.user_login').removeClass('modal_show');
          window.location = "sellers";
        }
        else if (response == "customer") {
          $('.log_form').trigger('reset');
          $('.seller_log_err_msg').css('display', 'none');
          $('.user_login').removeClass('modal_show');
          window.location = "customers";
        }
        else {
          $('.seller_log_err_msg').text(response);
          $('.seller_log_err_msg').css('display', 'block');
        }
      }
    });
  });
});