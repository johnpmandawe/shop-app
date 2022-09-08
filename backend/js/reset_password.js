$(document).ready(function () {
  // PREVENT FORM SUBMIT
  $('.email_submit').submit(function (e) {
    e.preventDefault();
  });
  $('.reset_form').submit(function (e) {
    e.preventDefault();
  });
  function reLoad () {
    window.location = "../";
  }
  // SUBMIT EMAIL
  $('.submit_email').click(function () {
    $.ajax({
      method: 'POST',
      url: '../backend/php/submit_email.php',
      data: {'formData': $('.email_submit').serialize()},
      success: function (result) {
        if (result == "customer") {
          $('.content').css('display', 'none');
          $('.hidden_content').css('display', 'block');
          $('.hidden_btn').click(function () {
            $.ajax({
              method: 'POST',
              url: '../backend/php/customer_reset_password.php',
              data: {'formData': $('.reset_form').serialize()},
              success: function (result) {
                if (result == "success") {
                  $('.hidden_error_msg').css('display', 'none');
                  $('.hidden_success_msg').text("Password updated!");
                  $('.hidden_success_msg').css('display', 'block');
                  setTimeout(reLoad, 1000);
                } else {
                  $('.hidden_success_msg').css('display', 'none');
                  $('.hidden_error_msg').text(result);
                  $('.hidden_error_msg').css('display', 'block');
                }
              }
            });
          });
        }
        else if (result == "seller") {
          $('.content').css('display', 'none');
          $('.hidden_content').css('display', 'block');
          $('.hidden_btn').click(function () {
            $.ajax({
              method: 'POST',
              url: '../backend/php/seller_reset_password.php',
              data: {'formData': $('.reset_form').serialize()},
              success: function (result) {
                if (result == "success") {
                  $('.hidden_error_msg').css('display', 'none');
                  $('.hidden_success_msg').text("Password updated!");
                  $('.hidden_success_msg').css('display', 'block');
                  setTimeout(reLoad, 1000);
                } else {
                  $('.hidden_success_msg').css('display', 'none');
                  $('.hidden_error_msg').text(result);
                  $('.hidden_error_msg').css('display', 'block');
                }
              }
            });
          });
        }
        else {
          $('.primary_msg').text(result);
          $('.primary_msg').css('display', 'block');
        }
      }
    });
  });
});
// window.addEventListener('pageshow', function () {
//   // PREVENT FORM SUBMIT
//   document.querySelector('.seller_email_submit').onsubmit = (e) => {
//     e.preventDefault();
//   }
//   document.querySelector('.seller_reset_form').onsubmit = (e) => {
//     e.preventDefault();
//   }
//   // SELLER EMAIL VALIDATION
//   document.querySelector('.submit_email').addEventListener('click', function () {
//     let xhr = new XMLHttpRequest();
//     let email = document.querySelector('.seller_email_submit');
//     xhr.open('POST', '../../backend/php/sel_res_pass.php', true);
//     xhr.onload = () => {
//       if (xhr.readyState === XMLHttpRequest.DONE) {
//         if (xhr.status === 200) {
//           let data = xhr.response;
//           if (data == "success") {
//             document.querySelector('.primary_content').style.display = "none";
//             document.querySelector('.hidden_content').style.display = "block";
//           } else {
//             document.querySelector('.primary_msg').textContent = data;
//             document.querySelector('.primary_msg').style.display = "block";
//           }
//         }
//       }
//     }
//     let formData = new FormData(email);
//     xhr.send(formData);
//   });
//   // SELLER PASSWORD RESET
//   document.querySelector('.hidden_btn').addEventListener('click', function () {
//     let xhr = new XMLHttpRequest();
//     xhr.open('POST', '../../backend/php/sel_res_pass1.php', true);
//     xhr.onload = () => {
//       if (xhr.readyState === XMLHttpRequest.DONE) {
//         if (xhr.status === 200) {
//           let data = xhr.response;
//           if (data == "success") {
//             document.querySelector('.hidden_error_msg').style.display = "none";
//             document.querySelector('.hidden_success_msg').textContent = "Password reset complete!";
//             document.querySelector('.hidden_success_msg').style.display = "block";
//             function reLoad () {
//               window.location = "../../";
//             }
//             setTimeout(reLoad, 1000);
//           } else {
//             document.querySelector('.hidden_error_msg').textContent = data;
//             document.querySelector('.hidden_error_msg').style.display = "block";
//             document.querySelector('.hidden_success_msg').style.display = "none";
//           }
//         }
//       }
//     }
//     let newFormData = new FormData(document.querySelector('.seller_reset_form'));
//     xhr.send(newFormData);
//   });
// });