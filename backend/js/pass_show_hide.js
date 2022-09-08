window.addEventListener('pageshow', function () {
  // DECLARING VARIABLES 
  let seller_eye = document.querySelector('.seller_eye'),
  sel_pass_field = document.querySelector('.sel_pass_field');
  // SHOW PASSWORD IF EYE ICON IS CLICKED
  seller_eye.onclick = () => {
    if (sel_pass_field.type == "password") {
      sel_pass_field.type = "text";
      seller_eye.classList.add('active');
    } else {
      sel_pass_field.type = "password";
      seller_eye.classList.remove('active');
    }
  }
});