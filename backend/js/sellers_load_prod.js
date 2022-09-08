window.addEventListener('pageshow', function () {
  // DECLARING VARIABLES
  let load_products = document.querySelector('.load_products'),
  load_prod_text = document.querySelector('.load_prod_text');
  // LOADING PRODUCTS EVERY 5 MILLISECONDS
  setInterval(loadProd, 500);
  // LOAD PRODUCT CODE
  function loadProd () {
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '../backend/php/seller_load_prod.php', true);
    xhr.onload = () => {
      if (xhr.readyState === XMLHttpRequest.DONE) {
        if (xhr.status === 200) {
          let result = xhr.response;
          if (result == "failed") {
            load_prod_text.textContent = "No products to show.";
            load_prod_text.style.display = "block";
          } else {
            if(!load_products.classList.contains('active')) {
              load_products.innerHTML = result;
            }
            load_prod_text.style.display = "none";
          }
        } 
      }
    }
    xhr.send();
  }
});