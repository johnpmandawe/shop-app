$(document).ready( function () {
  loadCusData();
  setInterval(loadCustomerOder, 500);
  getShops();
  // PREVENT FORM SUBMIT
  document.querySelector('.cus_profile_form').addEventListener('submit', function (e) {
    e.preventDefault();
  });
  $('.no').click(function () {
    $('.modal').removeClass('modal_show');
  });
  // DISABLE LOAD ORDER ON MOUSEENTER 
  $('.load_orders').mouseenter(function () {
    $(this).addClass('active');
  });
  $('.load_orders').mouseleave(function () {
    $(this).removeClass('active');
  });
  // LOAD CUSTOMER ORDERS
  function loadCustomerOder () {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../backend/php/load_customer_order.php', true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          if(!document.querySelector('.load_orders').classList.contains('active')) {
            document.querySelector('.load_orders').innerHTML = data;
          }
        }
      }
    }
    xhr.send();
  }
  // GET SHOPS 
  function getShops() {
    $.ajax({
      method: 'POST',
      url: '../backend/php/get_shops.php',
      dataType: 'html',
      success: function (result) {
        $('.shop_dropdown').html(result);
      }
    });
  }
  // SHOW SHOPS
  $('.show_shops').click(function () {
    let show = "Show Shops";
    let hide = "Hide Shops";
    let shop_dropdown = $('.shop_dropdown');
    if(!shop_dropdown.hasClass('toggle_shop')) {
      shop_dropdown.addClass('toggle_shop');
      $(this).text(hide);
    } else {
      shop_dropdown.removeClass('toggle_shop');
      $(this).text(show);
    }
  });
  // LOAD CART GROUP
  function loadCartGroup() {
    $.ajax({
      method: 'POST',
      url: '../backend/php/load_cart.php',
      dataType: 'html',
      success: function (result) {
        if(result == "Empty.") {
          $('.cart_btn_checkout').attr('disabled', 'disabled');
          $('.cart_content').html(result);
        } else {
          if(!$('.cart_content').hasClass('active')) {
            $('.cart_content').html(result);
          }
        }
      }
    });
  }
  // LOAD CART SINGLE
  function loadCartSingle() {
    $.ajax({
      method: 'POST',
      url: '../backend/php/load_cart_single.php',
      dataType: 'html',
      success: function (result) {
        if(result == "Empty.") {
          $('.cart_btn_checkout').attr('disabled', 'disabled');
          $('.cart_content').html(result);
        } else {
          if(!$('.cart_content').hasClass('active')) {
            $('.cart_content').html(result);
          }
        }
      }
    });
  }
  //LOAD CHECKBTN
  loadCheckBtn();
  function loadCheckBtn() {
    $.ajax({
      method: "GET",
      url: "../backend/php/load_checkbtn.php",
      dataType: "html",
      success: function (result) {
        $('.group_by_checkbox').html(result);
      }
    });
  }
  // CODE FOR CUSTOM CHECKBOX
  $('.group_by_checkbox').on('click', function () {
    $('#checkbtn').on('change', function () {
      let check_id = $(this).closest('.group_by_checkbox').find('.check_id').val();
      if($(this).is(':checked')) {
        $.ajax({
          method: "POST",
          url: "../backend/php/check.php",
          data: {'check_id': check_id}
        });
        $('.custom_checkbtn').addClass('checked');
        loadCartGroup();
      } else {
        $.ajax({
          method: "POST",
          url: "../backend/php/uncheck.php",
          data: {'check_id': check_id}
        });
        $('.custom_checkbtn').removeClass('checked');
        loadCartSingle();
      }
    });
  });
  $('.cart_content').mouseenter(function () {
    $(this).addClass('active');
  });
  $('.cart_content').mouseleave(function () {
    $(this).removeClass('active');
  });
  setInterval(defaultCartLoad, 500);
  function defaultCartLoad() {
    if($('#checkbtn').is(':checked')) {
      loadCartGroup();
    } else {
      loadCartSingle();
    }
  }
  $('.cart_content').on('click', function () {
    // SHOW-HIDE CART DETAILS
    $('.cart_btn_details').each(function () {
      $(this).on('click', function () {
        let cart_details = $(this).closest('.cart').find('.cart_details');
        let cart_btn_details = $(this).closest('.cart').find('.cart_btn_details');
        if(!cart_details.hasClass('cart_show')) {
    
          cart_details.addClass('cart_show');
          cart_btn_details.text('Hide');
    
        } else {
    
          cart_details.removeClass('cart_show');
          cart_btn_details.text('Show');
    
        }
      });
    });
    // REMOVE FROM CART  
    $('.cart_btn_remove').each(function () {
      $(this).click(function () {
        let cart_id = $(this).closest('.cart').find('.cart_id').text();
        let cart = $(this).closest('.cart');
        cart.css('display', 'none');
        $.ajax({
          method: 'POST',
          url: '../backend/php/remove_cart.php',
          data: {'cart_id': cart_id},
          success: function (response) {
            if(response == 'success') {
              window.location.reload();
            }
          }
        });
      });
    });
    // INCREMENT AND DECREMENT QUANTITY
      $('.increment').each( function () {
        let counter = $(this).closest('.cart_details').find('.value').val();
        $(this).click(function () {
          let cart_price = $(this).closest('.cart_details').find('.cart_price').val();
          let max = $(this).closest('.cart_details').find('.value').attr('max');
          let min = $(this).closest('.cart_details').find('.value').attr('min');
          counter++;
          if (counter > max) {
            counter = max;
          }
          else if (counter < min) {
            counter = min;
          }
          $(this).closest('.cart_details').find('.value').val(counter);
          cart_price *= counter;
          $(this).closest('.cart_details').find('p .visible_cart_total').text(cart_price);
          $.ajax({
            method: 'POST',
            url: '../backend/php/increment_decrement.php',
            data: {
              'cart_id': $(this).closest('.cart_details').find('.cart_id').val(), 
              'cart_quant': counter,
              'cart_total': $(this).closest('.cart_details').find('p .visible_cart_total').text()
            }
          });
        });
      });

      $('.decrement').each( function () {
        let counter = $(this).closest('.cart_details').find('.value').val();
        $(this).click(function () {
          let cart_price = $(this).closest('.cart_details').find('.cart_price').val();
          let max = $(this).closest('.cart_details').find('.value').attr('max');
          let min = $(this).closest('.cart_details').find('.value').attr('min');
          counter--;
          if (counter > max) {
            counter = max;
          }
          else if (counter < min) {
            counter = min;
          }
          $(this).closest('.cart_details').find('.value').val(counter);
          cart_price *= counter;
          $(this).closest('.cart_details').find('p .visible_cart_total').text(cart_price);
          $.ajax({
            method: 'POST',
            url: '../backend/php/increment_decrement.php',
            data: {
              'cart_id': $(this).closest('.cart_details').find('.cart_id').val(), 
              'cart_quant': counter,
              'cart_total': $(this).closest('.cart_details').find('p .visible_cart_total').text()
            }
          });
        });
      });
    // CHECKOUT CODE FOR SINGLE CART
    $('.cart_checkout_btn').each( function () {
      $(this).click( function () {
        let cart_id = $(this).closest('.cart').find('.cart_id').text();
        $.ajax({
          method: "POST",
          url: "../backend/php/payment_form_fetch.php",
          data: {
            'cart_id': cart_id
          },
          success: function (result) {
            $('.load_here').html(result);
          }
        });
        $('.payment').addClass('modal_show');
      });
    });

  });
  // CHECKOUT CODE FOR GROUPED CART
  $('.cart_btn_checkout').each(function () {
    $(this).click(function () {
      let formData = $(this).closest('.cart').find('.cart_form');
      let cart_id = $(this).closest('.cart').find('.cart_id').text();
      $.ajax({
        method: 'POST',
        url: '../backend/php/payment_form_fetch.php',
        data: {
          'formData': formData.serialize(),
          'cart_id': cart_id
        },
        success: function (result) {
          $('.load_here').html(result);
        }
      });
      $('.payment').addClass('modal_show');
    });
  });
  // PREVENT PAYMENT FORM SUBMIT 
  $('.payment_form').submit(function (e) {
    e.preventDefault();
  });
  // PAYMENT CODE
  $('.payment_btn').click(function () {
    let ddval = $('.selection').val();
    if(ddval == "cod") {
      let formData = $('#order_details').serialize();
      $.ajax({
        method: 'POST',
        url: '../backend/php/cod.php',
        data: {
          'formData': formData
        },
        success: function (response) {
          console.log(response);
        }
      });
      $('.payment').removeClass('modal_show');
      $('.trans_success').addClass('modal_show');
    }
    else if (ddval == "online") {
      alert('Just click the paypal button below.');
    }
  });
  $('.load_orders').on('click', function () {
    // SHOW ORDER DETAILS
  
    $('.show_details').each(function () {
  
      $(this).click(function () {
  
        let order_details = $(this).closest('.order').find('.order_details');
        let btnText = $(this).closest('p').find('.show_details button');
        if(order_details.hasClass('show')) {
    
          order_details.removeClass('show');
          btnText.text('Show');
    
        } else {
    
          order_details.addClass('show');
          btnText.text('Hide');
    
        }
  
      });
  
    });
    $('.cancel').each(function () {
      $(this).click(function () {
        let trans_code = $(this).closest('.order').find('p .trans_code').text();
        let quant = $(this).closest('.order').find('.order_details .prod_quant').text();
        let id = $(this).closest('.order').find('.order_details .prod_id').text();
        $.ajax({
          method: 'POST',
          url: '../backend/php/trans_quant.php',
          data: {'trans_code': trans_code,
          'quant': quant,
        
          'prod_id': id},
          success: function (res) {
            $('.hidden_inputs').html(res);
          }
        });
        $('.cancel_modal').addClass('modal_show');
      });
    });
  });
  // CANCEL ORDER
  $('.yes').click(function () {
    let trans_code = $(this).closest('.btn_field').find('.hidden_inputs .trans_code').val();
    let quant = $(this).closest('.btn_field').find('.hidden_inputs .quant').val();
    let prod_id = $(this).closest('.btn_field').find('.hidden_inputs .prod_id').val();
    $.ajax({
      method: 'POST',
      url: '../backend/php/cancel_order.php',
      data: {
        'trans_code': trans_code,
        'quant': quant,
        'prod_id': prod_id
      },
      success: function (res) {
        if (res == "success") {
          function reLoad() {
  
            window.location.reload();
  
          }
          $('.cancel_modal').removeClass('modal_show');
  
          setTimeout(reLoad, 1000);
        }
      }
    });
  });
  // LOAD CUSTOMER PROFILE DATA
  function loadCusData() {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '../backend/php/cus_load_data.php', true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if(xhr.status === 200) {
          let data = xhr.response;
          document.querySelector('.load_cus_data').innerHTML = data;
        }
      }
    }
    xhr.send();
  }
  // SUBMIT FORM DATA ON BUTTON CLICK
  document.querySelector('.cus_update_btn').addEventListener('click', function () {
    let cus_update_err_msg = document.querySelector('.cus_update_err_msg'),
    cus_update_suc_msg = document.querySelector('.cus_update_suc_msg');
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../backend/php/cus_update_data.php', true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          if (data == "success") {
            cus_update_suc_msg.textContent = "Profile Updated!";
            cus_update_suc_msg.style.display = "block";
            cus_update_err_msg.style.display = "none";
            function fade () {
              cus_update_suc_msg.style.display = "none";
              window.location = "#account";
            }
            setTimeout(fade, 1500);
          } else {
            cus_update_err_msg.textContent = data;
            cus_update_err_msg.style.display = "block";
            cus_update_suc_msg.style.display = "none";
          }
        }
      }
    }
    let formData = new FormData(document.querySelector('.cus_profile_form'));
    xhr.send(formData);
  });
  // ICON HIGHLIGHT ON CLICK
  let menu_icons = document.querySelectorAll('.menu_icons');
  for (let x = 0; x < menu_icons.length; x++) {
    const icon = menu_icons[x];
    icon.addEventListener('click', function () {
      for (let y = 0; y < menu_icons.length; y++) {
        const icon = menu_icons[y];
        icon.classList.remove('active');
          
      }
      icon.classList.add('active');
    });
      
  }
  // LOGOUT CODE
  document.querySelector('.cus_logout').addEventListener('click', function () {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../backend/php/cus_logout.php', true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data =xhr.response;
          if(data == "success") {
            window.location = "../";
          }
        }
      }
    }
    xhr.send();
  });
  // SEARCH SHOPS
  let search = document.querySelector('.search');
  search.onkeyup = () => {
    let searchStr = search.value;
    if(searchStr != "") {
      search.classList.add('active');
    } else {
      search.classList.remove('active');
    }
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../backend/php/search_shop.php', true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          document.querySelector('.load_shops').innerHTML = data;
        }
      }
    }
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send('searchStr=' + searchStr);
  }
  // LOAD SHOPS
  let xhr = new XMLHttpRequest();
  xhr.open('GET', '../backend/php/cus_load_shops.php', true);
  xhr.onload = () => {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        let data = xhr.response;
        if(!search.classList.contains('active')) {
          document.querySelector('.load_shops').innerHTML = data;
        }
      }
    }
  }
  xhr.send();
  // EXIT MODAL
  $('.exit').each(function () {
    $(this).click(function () {
      $('.modal').removeClass('modal_show');
    });
  });
  // SHOW TRANSACTION SUCCESS MODAL AFTER SUCCESSFUL ORDER
  $('.ok').click(function () {
    $('.trans_success').removeClass('modal_show');
    window.location.reload();
  });
});