<?php 
session_start();
include_once 'config.php';
$add_prod = new Conn();
$name = $_POST['prod_name'];
$stock = $_POST['prod_stock'];
$price = $_POST['prod_price'];
if (!empty($name) && !empty($stock) && !empty($price)) {
  if ($stock > 0) {
    if ($price > 0) {
      $filter_prod_name = $add_prod->getProductName($name); // Get product name from database
      if($filter_prod_name->rowCount() > 0) { // If product name already exist, display error message
        echo 'Product name already exists.';
      } else { // Else, add product to database
        if (isset($_FILES['image'])) {
          $extensions = ['jpeg', 'png', 'jpg'];
          $img_name = $_FILES['image']['name'];
          $tmp_name = $_FILES['image']['tmp_name'];
          $exploded = explode('.', $img_name);
          $ext = end($exploded);
          if (in_array($ext, $extensions) === true) {
            $time = time();
            $new_image_name = $time.$img_name;
            if (move_uploaded_file($tmp_name, '../../sellers/product_img/'.$new_image_name)) {
                
              $ins = $add_prod->addProd($new_image_name, $name, $stock, $price, $_SESSION['seller_id']);
              if ($ins) {
                  echo 'success';
              } else {
                echo 'Something went wrong.';
              }
            }
          } else {
            echo 'Please select an image file - jpg, png, jpeg.';
          }
        } else {
          echo 'Please upload an image.';
        }
      }
    } else {
      echo 'Price must be greater than 0.';
    }
  } else {
    echo 'Stock must be greater than 0.';
  }
} else {
  echo 'All fields are required.';
}
?>