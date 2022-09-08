window.addEventListener('pageshow', function () {
  $.ajax({
    method: 'GET',
    url: 'backend/php/fetch_logo.php',
    dataType: 'html',
    success: function (response) {
      $('.seller_logo_wrapper').html(response);
    }
  });
});