window.addEventListener('pageshow', function () {
  // LOAD SELLER ORDERS
  loadSellerOrders();
  $('.back').click(function () {
    window.history.back();
  });
  function loadSellerOrders () {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', '../../backend/php/load_seller_orders.php', true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let data = xhr.response;
          document.querySelector('.mp_content').innerHTML = data;
        }
      }
    }
    xhr.send();
  }
  $('.mp_content').on('click', function () {
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
    // SELLER CONFIRM ORDER
    $('.confirm').each(function () {
      $(this).click(function () {
        let trans_code = $(this).closest('.order').find('.trans_code').text();
        $.ajax({
          method: 'POST',
          url: '../../backend/php/confirm_order.php',
          data: {'trans_code': trans_code},
          success: function (res) {
    
            if (res == "success") {
              window.location.reload();
            }
          }
        });
        $(this).css('background-color', 'rgb(144, 238, 144)');
        $(this).text('Confirmed');
        $(this).css('color', 'rgb(0, 0, 0)');
        $(this).attr('disabled', 'disabled');
      });
    });
  });
});