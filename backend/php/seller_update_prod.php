<?php 
include_once 'config.php';
$updateProduct = new Conn();
$id = $_POST['prod_id'];
$name = $_POST['prod_name'];
$size = $_POST['prod_size'];
$stock = $_POST['prod_stock'];
$price = $_POST['prod_price'];
if (!empty($name) && !empty($size) && !empty($stock) && !empty($price)) {
  if ($stock > 0) {
    if ($price > 0) {
      if ($_FILES['image']['name'] == "") {
        $withoutImage = $updateProduct->updateProdWithoutImage($name, $size, $stock, $price, $id);
        if ($withoutImage) {
          echo 'success';
        } else {
          echo 'Something went wrong.';
        }
      } else {
        $extensions = ['jpeg', 'png', 'jpg'];
        $img_name = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $exploded = explode('.', $img_name);
        $ext = end($exploded);
        if (in_array($ext, $extensions) === true) {
          $time = time();
          $new_image_name = $time.$img_name;
          if (move_uploaded_file($tmp_name, '../../sellers/product_img/'.$new_image_name)) {
              
            $withImage = $updateProduct->updateProdWithImage($new_image_name, $name, $size, $stock, $price, $id);
            if ($withImage) {
                echo 'success';
            } else {
              echo 'Something went wrong.';
            }
          }
        } else {
          echo 'Please select an image file - jpg, png, jpeg.';
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