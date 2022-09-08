$(document).ready(function () {
  // CALLING FUNCTIONS 
  getCus();
  getSel();
  // GET CUSTOMER ACCOUNTS
  function getCus() {
    $.ajax({
      method: 'GET',
      url: '../../backend/php/admin_get_cus.php',
      dataType: 'html',
      success: function (result) {
        $('.load_customers').html(result);
      }
    });
  }
  // GET SELLER ACCOUNTS
  function getSel() {
    $.ajax({
      method: 'GET',
      url: '../../backend/php/admin_get_sel.php',
      dataType: 'html',
      success: function (result) {
        $('.load_sellers').html(result);
      }
    });
  }
  // BLOCK AND UNBLOCK CUSTOMER ACCOUNT
  $('.load_customers').on('click', function () {
    $('.cus_block').each(function () {
      $(this).click(function () {
        let cus_id = $(this).closest('.body').find('.id').val();
        $.ajax({
          method: 'POST',
          url: '../../backend/php/admin_block_cus.php',
          data: {'customer_id': cus_id}
        });
        $(this).css('background-color', 'rgb(0, 0, 255)');
        $(this).text('Unblock');
      });
    });
    $('.cus_unblock').each(function () {
      $(this).click(function () {
        let cus_id = $(this).closest('.body').find('.id').val();
        $.ajax({
          method: 'POST',
          url: '../../backend/php/admin_unblock_cus.php',
          data: {'customer_id': cus_id}
        });
        $(this).css('background-color', 'rgb(255, 0, 0)');
        $(this).text('Block');
      });
    });
  });
  // BLOCK AND UNBLOCK SELLER ACCOUNT
  $('.load_sellers').on('click', function () {
    $('.sel_block').each(function () {
      $(this).click(function () {
        let sel_id = $(this).closest('.body').find('.id').val();
        $.ajax({
          method: 'POST',
          url: '../../backend/php/admin_block_sel.php',
          data: {'seller_id': sel_id}
        });
        $(this).css('background-color', 'rgb(0, 0, 255)');
        $(this).text('Unblock');
      });
    });
    $('.sel_unblock').each(function () {
      $(this).click(function () {
        let sel_id = $(this).closest('.body').find('.id').val();
        $.ajax({
          method: 'POST',
          url: '../../backend/php/admin_unblock_sel.php',
          data: {'seller_id': sel_id}
        });
        $(this).css('background-color', 'rgb(255, 0, 0)');
        $(this).text('Block');
      });
    });
  });
  // ADMIN LOGOUT
  $('.logout').click(function () {
    $.ajax({
      method: 'POST',
      url: '../../backend/php/admin_logout.php',
      success: function (response) {
        if(response == "success") {
          window.location = "../";
        }
      }
    });
  });
});