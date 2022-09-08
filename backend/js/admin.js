$(document).ready(function () {
  // PREVENT FORM SUBMIT
  $('.admin_login_form').submit(function (e) {
    e.preventDefault();
  });
  // AJAX REQUEST FOR ADMIN LOGIN
  $('.btn').click(function () {
    let formData = $('.admin_login_form').serialize();
    $.ajax({
      method: 'POST',
      url: '../backend/php/admin_login.php',
      data: {'formData': formData},
      success: function (response) {
        if(response == "success") {
          $('.admin_login_form').trigger('reset');
          window.location = "dashboard/";
        }
      }
    })
  });
});