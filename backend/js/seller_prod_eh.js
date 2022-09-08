$(document).ready(function () {
  function reLoad () {
    window.location.reload();
  }
  // PREVENTS FORM FROM SUBMITTING
  $('.update_prod_form').submit(function (e) {
    e.preventDefault();
  });
  // SELLER LOGOUT REQUEST CODE
  $('#logout').click( function () {
    $.ajax({
      method: 'POST', 
      url: '../backend/php/seller_logout.php',
      success: function (res) {
        if (res == "success") {
          window.location = "../";
        }
      }
    });
  });
  // FETCHING SELLER PROFILE DATA ON MODAL
  $('#edit_profile').click( function () {
    $.ajax({
      method: 'POST', 
      url: '../backend/php/seller_load_data.php',
      success: function (res) {
        $('.load_seller').html(res);
      }
    });
  });
  // SELLER UPDATE PROFILE REQUEST CODE
  $('.seller_update_btn').click(function () {
    let seller_update_form = document.querySelector('.seller_update_form'),
    seller_update_err = document.querySelector('.seller_update_err'),
    seller_update_suc = document.querySelector('.seller_update_suc');
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../backend/php/seller_ep.php', true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let res = xhr.response;
          if (res == "success") {
            seller_update_suc.textContent = "Profile Updated!";
            seller_update_suc.style.display = "block";
            seller_update_err.style.display = "none";
            
            setTimeout(reLoad, 1000);
 
          } else {
            seller_update_err.textContent = res;
            seller_update_suc.style.display = "none";
            seller_update_err.style.display = "block";
          }
        }
      }
    }
    let data = new FormData(seller_update_form);
    xhr.send(data);
  });
  let seller_name_wrapper = document.querySelector('.seller_name_wrapper'),
  seller_menu = document.querySelector('.seller_menu');
  seller_name_wrapper.addEventListener('click', function () {
    if (!seller_menu.classList.contains('active')) {
      seller_menu.classList.add('active');
    } else {
      seller_menu.classList.remove('active');
    }
  });
  //GETTING SELLER LOGO 
  $.ajax({
    method: 'GET',
    url: '../backend/php/get_seller_name.php',
    dataType: 'text',
    success: function (res) {
      $('.seller_logo').html(res);
    }
  });
  $('.load_products').on('click', function () {
    $(this).addClass('active');
    $('.prod_update').click(function () {
        $('.update_prod').addClass('modal_show');
        let prod_id = $(this).closest('.ops').find('.product_id').text();
        $.ajax({
          method: 'POST',
          url: '../backend/php/seller_fetch_prod.php',
          data: {'prod_id': prod_id},
          success: function (result) {
            $('.seller_update').html(result);
          }
        });
    });
    // DELETING SELLER PRODUCTS
    $('.prod_delete').click(function () {
      
      let id = $(this).closest('.ops').find('.product_id').text();
      $.ajax({
        method: 'POST',
        url: '../backend/php/seller_delete_prod.php',
        data: {'id': id},
        success: function () {
          location.reload();
        }
      });
    });
    // ZOOM PRODUCT IMAGE ONCLICK
    $('.product_image').click( function () {
      let img = $(this).attr('src');
      $('.zoom').css('background-image', 'url(' + img + ')');
      $('.zoom').css('display', 'block');
    });
    $('.close').click(function () {
      $('.zoom').css('display', 'none');
    });
    //UPDATE SELLER PRODUCT REQUEST CODE
    let update_prod_btn = document.querySelector('.update_prod_btn'),
    update_prod_err = document.querySelector('.update_prod_err'),
    update_prod_suc = document.querySelector('.update_prod_suc'),
    update_prod_form = document.querySelector('.update_prod_form');
    update_prod_btn.addEventListener('click', function () {
      let xhr = new XMLHttpRequest();
      xhr.open('POST', '../backend/php/seller_update_prod.php', true);
      xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
          if (xhr.status === 200) {
            let data = xhr.response;
            if (data == "success") {
              update_prod_err.style.display = "none";
              update_prod_suc.textContent = "Product Updated!";
              update_prod_suc.style.display = "block";
              setTimeout(reLoad, 1000);
            } else {
              update_prod_suc.style.display = "none";
              update_prod_err.textContent = data;
              update_prod_err.style.display = "block";
            }
          }
        }
      }
      let formData = new FormData(update_prod_form);
      xhr.send(formData);
    });
  });
});