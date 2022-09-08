window.addEventListener('pageshow', function () {
  // SHOW DROPDOWN ON MOUSE HOVER
  const reg_btn = document.querySelector('.register');
  reg_btn.onmouseenter = () => {
    document.querySelector('.drp_rgt').classList.add('show');
  }
  reg_btn.onmouseleave = () => {
    document.querySelector('.drp_rgt').classList.remove('show');
  }
});