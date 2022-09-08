window.addEventListener('pageshow', function () {
  // DECLARING VARIABLES 
  let add_new_btn = document.querySelector('.add_btn'),
  new_prod_form = document.querySelector('.new_prod_form'),
  new_prod = document.querySelector('.new_prod'),
  exits = document.querySelectorAll('.exit'),
  modals = document.querySelectorAll('.modal'),
  add_prod_btn = document.querySelector('.add_prod_btn'),
  msgs = document.querySelectorAll('.msg'),
  add_prod_err = document.querySelector('.add_prod_err'),
  update_seller = document.querySelector('.update_seller'),
  edit_profile = document.querySelector('#edit_profile'),
  seller_update_form = document.querySelector('.seller_update_form');
  // PREVENT FORM SUBMIT
  new_prod_form.onsubmit = (e) => {
    e.preventDefault();
  }
  seller_update_form.onsubmit = (e) => {
    e.preventDefault();
  }
  add_new_btn.onclick = () => {
    new_prod.classList.add('modal_show');
  }
  edit_profile.addEventListener('click', function () {
    update_seller.classList.add('modal_show');
  });
  // REMOVES MODAL IF CANCEL BUTTON IS CLICKED
  for (let x = 0; x < exits.length; x++) {
    const exit = exits[x];
    exit.addEventListener('click', function () {
      for (let y = 0; y < modals.length; y++) {
         
       const modal = modals[y];
       modal.classList.remove('modal_show');
         
      }
      for (let x = 0; x < msgs.length; x++) {
        const msg = msgs[x];
            
        msg.style.display = "none";   
      }
    });
      
  }
  // ADDING NEW PRODUCT 
  add_prod_btn.addEventListener('click', function () {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../backend/php/seller_add_prod.php', true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let result = xhr.response;
          if(result == "success") {
            window.location.reload();
          } else {
            add_prod_err.textContent = result;
            add_prod_err.style.display = "block";
          }
        }
      }
    }
    let formData = new FormData(new_prod_form);
    xhr.send(formData);
  });
});