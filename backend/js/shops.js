window.addEventListener('pageshow', function () {
  // PREVENT FORM SUBMIT
  document.querySelector('.cus_order_form').onsubmit = (e) => {
    e.preventDefault();
  }
  $('.confirm_order_form').submit(function (e) {
    e.preventDefault();
  });
  $('.payment_form').submit(function (e) {
    e.preventDefault();
  });
  function reLoad() {
    window.location.reload();
  }
  // SUBMITTING ORDER
  $('.submit_btn').click(function () {
    
    let formData = new FormData(document.querySelector('.cus_order_form'));
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../backend/php/order_confirm.php', true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          if (data == "failed") {
            document.querySelector('.confirm_order_err_msg').textContent = "Quantity is required.";
            document.querySelector('.confirm_order_err_msg').style.display = "block";
          } else if (data == "Invalid input") {
            document.querySelector('.confirm_order_err_msg').textContent = data;
            document.querySelector('.confirm_order_err_msg').style.display = "block";
          }
          else {
            document.querySelector('.load_order_details').innerHTML = data;
            document.querySelector('.confirm_order_err_msg').style.display = "none";
            $('.customer_order').removeClass('modal_show');
            $('.order_confirm').addClass('modal_show');
          }
        }
      }
    }
    xhr.send(formData);
  });
  let back_btn = document.querySelector('.back_btn');
  // BACK NAVIGATION
  back_btn.addEventListener('click', function () {
    window.history.back();
  });
  loadShopProd();
  function loadShopProd () {
    let baseUrl = window.location.href;
  
    let id = baseUrl.substring(baseUrl.lastIndexOf('=') + 1);
    $.ajax({
      method: 'POST',
      url: '../backend/php/shops_load_prod.php',
      data: {'seller_id': id},
      dataType: 'html',
      success: function (response) {
        $('.load_shops').html(response);
      }
    });
  }
  $('.load_shops').on('click', function () {
    // ZOOM IMAGE 
    $('.shop_product img').click(function () {
        let path = $(this).attr('src');
        $('.item_zoom').css('background-image', 'url('+ path + ')');
        $('.item_zoom').addClass('show');
    })
    // ZOOM EXIT 
    $('.zoom_exit').click(function () {
        $('.item_zoom').removeClass('show');
    });
    $('.order_btn').click(function () {
      let prod_id = $(this).closest('.shop_product').find('.prod_id').text();
      let prod_size = $(this).closest('.shop_product').find('input[name=sizes]:checked').val();
      $.ajax({
        method: 'POST',
        url: '../backend/php/shops_fetch_prod.php',
        data: {'prod_id': prod_id,
               'prod_size': prod_size},
        dataType: 'html',
        success: function (result) {
          if (result != 'failed') {
            $('.load_order').html(result);
          } else {
            alert('Pick a size');
          }
        }
      });
      $('.customer_order').addClass('modal_show');
    });
    $('.exit').click(function () {
        $('.modal').removeClass('modal_show');
        $('.modal_content form').trigger('reset');
        $('.confirm_order_err_msg').css('display', 'none');
        $('.not_msg').css('display', 'none');
        $('.added_msg').css('display', 'none');
  
    });
  });
  $('.add_to_cart').click(function () {
    let formData = $('.confirm_order_form').serialize();
    $.ajax({
      method: 'POST',
      url: '../backend/php/add_to_cart.php',
      data: {
              
        'formData': formData
        
      },
      success: function (response) {
        if(response == 'success') {
          $('.not_msg').css('display', 'none');
          $('.added_msg').text('Added to Cart!');
          $('.added_msg').css('display', 'block');
          setTimeout(reLoad, 1000);
        } else {
          $('.added_msg').css('display', 'none');
          $('.not_msg').text(response);
          $('.not_msg').css('display', 'block');
        }
      }
    });
  });
});