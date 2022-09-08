window.addEventListener('pageshow', function () {
  const exitBtn = document.querySelectorAll('.exit'),
  drp_reg_seller = document.querySelector('.drp_reg_seller'),
  drp_reg_customer = document.querySelector('.drp_reg_customer'),
  login = document.querySelector('.login');
  
  // DISPLAY MODALS ON DROPDOWN CLICK
  drp_reg_seller.onclick = () => {
    document.querySelector('.seller_reg').classList.add('modal_show');
  }
  drp_reg_customer.onclick = () => {
    document.querySelector('.customer_reg').classList.add('modal_show');
  }
  login.onclick = () => {
    document.querySelector('.user_login').classList.add('modal_show');
  }
  // PREVENT FORM SUBMIT
  $('.log_form').submit(function (e) {
    e.preventDefault();
  });
  // REMOVE MODALS IF CANCEL BUTTON IS CLICKED
   
  for (let x = 0; x < exitBtn.length; x++) {
    const exit = exitBtn[x];
    exit.onclick = () => {
      const modals = document.querySelectorAll('.modal');
      for (let x = 0; x < modals.length; x++) {
        const modal = modals[x];
            
        modal.classList.remove('modal_show');   
      }
      const msgs = document.querySelectorAll('.msg');
      for (let x = 0; x < msgs.length; x++) {
        const msg = msgs[x];
            
        msg.style.display = "none";   
      }
    }
  }
});