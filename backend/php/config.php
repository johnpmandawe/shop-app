<?php
  class Conn {
    public function connect() {
      $host = 'localhost';
      $uname = 'root';
      $pword = '';
      $dbname = 'shop_app';
      $dsn = "mysql:host=$host;dbname=$dbname";
      try {
        $pdo = new PDO($dsn, $uname, $pword);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        if (!$pdo) {
          echo 'Not Connected';
        }
        return $pdo;
      } catch (PDOException $e) {
        echo $e->getMessage();
      }
    }
    public function getSellerEmails($email) {
      $query = "SELECT * FROM sellers WHERE email = :email";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':email' => $email]);
      
      $rowCount = $stmt->rowCount();
      return $rowCount;
    }
    public function insertSellers($seller_id, $logo, $fname, $mname, $lname, $gender, $email, $cont, $address, $uname, $pword) {
      $query = "INSERT INTO sellers (seller_id, seller_logo, fname, mname, lname, gender, email, cont, address, uname, pword) VALUES (:seller_id, :seller_logo, :fname, 
      :mname, :lname, :gender, :email, :cont, :address, :uname, :pword)";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':seller_id' => $seller_id, ':seller_logo' => $logo ,':fname' => $fname, ':mname' => $mname, ':lname' => $lname, ':gender' => $gender, ':email' => $email, 
      ':cont' => $cont, ':address' => $address, ':uname' => $uname, ':pword' => $pword]);
      return $stmt;
    }
    public function getCustomerEmails($email) {
      $query = "SELECT * FROM customers WHERE email = :email";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':email' => $email]);
      
      $rowCount = $stmt->rowCount();
      return $rowCount;
    }
    public function insertCustomers($unique_id, $fname, $mname, $lname, $gender, $email, $cont, $address, $uname, $pword) {
      $query = "INSERT INTO customers (customer_id, fname, mname, lname, gender, email, cont, address, uname, pword) VALUES (:unique_id, :fname, 
      :mname, :lname, :gender, :email, :cont, :address, :uname, :pword)";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':unique_id' => $unique_id, ':fname' => $fname, ':mname' => $mname, ':lname' => $lname, ':gender' => $gender, ':email' => $email, 
      ':cont' => $cont, ':address' => $address, ':uname' => $uname, ':pword' => $pword]);
      return $stmt;
    }
    public function getSellerCred($uname, $pword) {
      $query = "SELECT * FROM sellers WHERE uname = :uname AND pword = :pword";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':uname' => $uname, ':pword' => $pword]);
      return $stmt;
    }
    public function getCusCred($uname, $pword) {
      $query = "SELECT * FROM customers WHERE uname = :uname AND pword = :pword";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':uname' => $uname, ':pword' => $pword]);
      return $stmt;
    }
    public function getSellerUID($seller_id) {
      $query = "SELECT * FROM sellers WHERE seller_id = :seller_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':seller_id' => $seller_id]);
      return $stmt;
    }
    public function getCustomerUID($unique_id) {
      $query = "SELECT * FROM customers WHERE customer_id = :unique_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':unique_id' => $unique_id]);
      return $stmt;
    }
    public function addProd($img, $name, $stock, $price, $seller_id) {
      $sizes = "Extra Small, Small, Medium, Large, Extra Large";
      $query = "INSERT INTO products (img, name, size, stock, price, seller_id) VALUES (:img, :name, :size, :stock, :price, :seller_id)";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':img' => $img, ':name' => $name, ':size' => $sizes, ':stock' => $stock, ':price' => $price, ':seller_id' => $seller_id]);
      return $stmt;
    }
    public function loadSellerProd($seller_id) {
      $query = "SELECT * FROM products WHERE seller_id = :seller_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':seller_id' => $seller_id]);
      return $stmt;
    }
    public function fetchProdDetails($prod_id) {
      $query = "SELECT * FROM products WHERE product_id = :id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':id' => $prod_id]);
      return $stmt;
    }
    public function updateProdWithImage($img, $name, $size, $stock, $price, $prod_id) {
      $query = "UPDATE products SET img = :img, name = :name, size = :size, stock = :stock, price = :price WHERE product_id = :id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':img' => $img, ':name' => $name, ':size' => $size, ':stock' => $stock, ':price' => $price, ':id' => $prod_id]);
      return $stmt;
    }
    public function updateProdWithoutImage($name, $size, $stock, $price, $prod_id) {
      $query = "UPDATE products SET name = :name, size = :size, stock = :stock, price = :price WHERE product_id = :id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':name' => $name, ':size' => $size, ':stock' => $stock, ':price' => $price, ':id' => $prod_id]);
      return $stmt;
    }
    public function deleteProd($prod_id) {
      $query = "DELETE FROM products WHERE product_id = :id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':id' => $prod_id]);
      return $stmt;
    }
    public function getSellerName($id) {
      $query = "SELECT * FROM sellers WHERE seller_id = :seller_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':seller_id' => $id]);
      return $stmt;
    }
    public function updateSellerProfile($fname, $mname, $lname, $gender, $email, $cont, $address, $uname, $id) {
      $query = "UPDATE sellers SET  fname = :fname, mname = :mname, lname = :lname, gender = :gender, email = :email, cont = :cont, address = :address, uname = :uname WHERE seller_id = :unique_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':fname' => $fname, ':mname' => $mname, ':lname' => $lname, ':gender' => $gender, ':email' => $email, ':cont' => $cont, ':address' => $address, ':uname' => $uname, ':unique_id' => $id]);
      return $stmt;
    }
    public function updateSellerProfileWithImage($seller_logo, $fname, $mname, $lname, $gender, $email, $cont, $address, $uname, $id) {
      $query = "UPDATE sellers SET seller_logo = :seller_logo,  fname = :fname, mname = :mname, lname = :lname, gender = :gender, email = :email, cont = :cont, address = :address, uname = :uname WHERE seller_id = :unique_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':seller_logo' => $seller_logo, ':fname' => $fname, ':mname' => $mname, ':lname' => $lname, ':gender' => $gender, ':email' => $email, ':cont' => $cont, ':address' => $address, ':uname' => $uname, ':unique_id' => $id]);
      return $stmt;
    }
    public function updateCustomerProfile($fname, $mname, $lname, $gender, $email, $cont, $address, $uname, $id) {
      $query = "UPDATE customers SET  fname = :fname, mname = :mname, lname = :lname, gender = :gender, email = :email, cont = :cont, address = :address, uname = :uname WHERE customer_id = :unique_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':fname' => $fname, ':mname' => $mname, ':lname' => $lname, ':gender' => $gender, ':email' => $email, ':cont' => $cont, ':address' => $address, ':uname' => $uname, ':unique_id' => $id]);
      return $stmt;
    }
    public function fetchLogos() {
      $query = "SELECT * FROM sellers";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute();
      return $stmt;
    }
    public function fetchProducts($searchStr) {
      $query = "SELECT * FROM products INNER JOIN sellers ON products.seller_id = sellers.seller_id WHERE products.name LIKE :searchStr AND sellers.blocked = '0'";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':searchStr' => '%'.$searchStr.'%']);
      return $stmt;
    }
    public function insertOrder($trans_code, $size, $date, $quant, $total, $status, $payment, $prod_id, $seller_id, $cus_id) {
      $query = "INSERT INTO orders (trans_code, size, date, quant, total, status, payment, product_id, seller_id, customer_id) VALUES (:trans_code, :size, :date, :quant, :total, :status, :payment, :product_id, :seller_id, :customer_id)";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':trans_code' => $trans_code, ':size' => $size, ':date' => $date, ':quant' => $quant, ':total' => $total, ':status' => $status, ':payment' => $payment, ':product_id' => $prod_id, ':seller_id' => $seller_id, ':customer_id' => $cus_id]);
      return $stmt;
    }
    public function decrementQuant($quant, $prod_id) {
      $query = "UPDATE products SET stock = (stock - :quant) WHERE product_id = :id ";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':quant' => $quant, ':id' => $prod_id]);
      return $stmt;
    }
    public function getCusOrders($cus_id) {
      $query = "SELECT orders.order_id as order_id, orders.size as size, products.product_id as prod_id, products.name as name, orders.quant as quant, 
      products.price as price, orders.total as total, orders.status as status, orders.date as date, orders.payment as payment FROM orders INNER JOIN products ON orders.product_id = products.product_id WHERE orders.customer_id = :cus_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':cus_id' => $cus_id]);
      return $stmt;
    }
    public function getSellerOrders($seller_id) {
      $query = "SELECT orders.payment as payment, orders.order_id as trans_code, orders.size as size, customers.fname as cus_fname, customers.lname as cus_lname, customers.address as cus_address, customers.cont as cus_cont,
      products.name as item, orders.quant as  order_quant, products.price as prod_price, orders.total as 
      order_total, orders.status as order_stat, orders.date as order_date FROM orders INNER JOIN products ON orders.product_id = products.product_id 
      INNER JOIN customers ON orders.customer_id = customers.customer_id WHERE orders.seller_id = :seller_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':seller_id' => $seller_id]);
      return $stmt;
    }
    public function updateORderStatus($trans_code) {
      $query = "UPDATE orders SET status = 'Confirmed' WHERE order_id = :id ";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':id' => $trans_code]);
      return $stmt;
    }
    public function cancelOrder($quant, $id, $trans_code) {
      $query = "UPDATE products SET stock = (stock + :quant) WHERE product_id = :id;
      
      DELETE FROM orders WHERE order_id = :trans_code";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':quant' => $quant, ':id' => $id, ':trans_code' => $trans_code]);
      return $stmt;
    }
    public function getSellerEmail($email) {
      $query = "SELECT * FROM sellers WHERE email = :email";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':email' => $email]);
      return $stmt;
    }
    public function resetSellerPass($pword, $email) {
      $query = "UPDATE sellers SET pword = :pword WHERE email = :email";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':pword' => $pword, ':email' => $email]);
      return $stmt;
    }
    public function getCusEmail($email) {
      $query = "SELECT * FROM customers WHERE email = :email";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':email' => $email]);
      return $stmt;
    }
    public function resetCusPass($pword, $email) {
      $query = "UPDATE customers SET pword = :pword WHERE email = :email";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':pword' => $pword, ':email' => $email]);
      return $stmt;
    }
    public function getCusEmailViaTransCode($trans_code) {
      $query = "SELECT * FROM orders WHERE order_id = :trans_code";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':trans_code' => $trans_code]);
      return $stmt;
    }
    public function getAdminDetails($uname, $pword) {
      $query = "SELECT * FROM admin WHERE uname = :uname AND pword = :pword";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':uname' => $uname, ':pword' => $pword]);
      return $stmt;
    }
    public function getAdminUID($admin_id) {
      $query = "SELECT * FROM admin WHERE admin_id = :admin_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':admin_id' => $admin_id]);
      return $stmt;
    }
    public function adminGetCus() {
      $query = "SELECT * FROM customers";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute();
      return $stmt;
    }
    public function adminGetSel() {
      $query = "SELECT * FROM sellers";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute();
      return $stmt;
    }
    public function adminBlockCus($cus_id) {
      $query = "UPDATE customers SET blocked = '1' WHERE customer_id = :customer_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':customer_id' => $cus_id]);
      return $stmt;
    }
    public function adminUnblockCus($cus_id) {
      $query = "UPDATE customers SET blocked = '0' WHERE customer_id = :customer_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':customer_id' => $cus_id]);
      return $stmt;
    }
    public function adminBlockSel($sel_id) {
      $query = "UPDATE sellers SET blocked = '1' WHERE seller_id = :seller_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':seller_id' => $sel_id]);
      return $stmt;
    }
    public function adminUnblockSel($sel_id) {
      $query = "UPDATE sellers SET blocked = '0' WHERE seller_id = :seller_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':seller_id' => $sel_id]);
      return $stmt;
    }
    public function addToCart($item, $size, $price, $quant, $total, $cus_id, $prod_id, $seller_id) {
      $query = "INSERT INTO cart (item, size, price, quant, total, customer_id, product_id, seller_id) VALUES (:item, :size, :price, :quant, :total, :customer_id, :product_id, :seller_id)";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':item' => $item, ':size' => $size, ':price' => $price, ':quant' => $quant, ':total' => $total, ':customer_id' => $cus_id, ':product_id' => $prod_id, ':seller_id' => $seller_id]);
      return $stmt;
    }
    public function loadCart($cus_id) {
      $query = "SELECT GROUP_CONCAT(cart.item SEPARATOR ', ') as items, GROUP_CONCAT(cart.size SEPARATOR ', ') as sizes, 
      GROUP_CONCAT(cart.price SEPARATOR ', ') as prices, SUM(cart.quant) as total_items, SUM(cart.total) as total_amount, 
      sellers.fname as shop_name, cart.seller_id as seller_id FROM cart INNER JOIN sellers ON cart.seller_id = sellers.seller_id 
      WHERE cart.customer_id = :customer_id GROUP BY cart.seller_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':customer_id' => $cus_id]);
      return $stmt;
    }
    public function loadCartForOrders($cus_id) {
      $query = "SELECT GROUP_CONCAT(cart.item SEPARATOR ', ') as items, GROUP_CONCAT(cart.size SEPARATOR ', ') as sizes, 
      GROUP_CONCAT(cart.price SEPARATOR ', ') as prices, SUM(cart.quant) as total_items, SUM(cart.total) as total_amount FROM cart 
      WHERE customer_id = :customer_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':customer_id' => $cus_id]);
      return $stmt;
    }
    public function loadCartCopy ($cus_id) {
      $query = "SELECT * FROM cart WHERE customer_id = :customer_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':customer_id' => $cus_id]);
      return $stmt;
    }
    public function removeCart($cart_id) {
      $query = "DELETE FROM cart WHERE seller_id = :cart_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':cart_id' => $cart_id]);
      return $stmt;
    }
    public function getSellerID($prod_id) {
      $query = "SELECT * FROM products WHERE product_id = :product_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':product_id' => $prod_id]);
      return $stmt;
    }
    public function getAllProducts() {
      $query = "SELECT * FROM products INNER JOIN sellers ON products.seller_id = sellers.seller_id WHERE sellers.blocked = '0'";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute();
      return $stmt;
    }
    public function getAllShops() {
      $query = "SELECT * FROM sellers";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute();
      return $stmt;
    }
    public function removeAllCart($cus_id) {
      $query = "DELETE FROM cart WHERE customer_id = :customer_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':customer_id' => $cus_id]);
      return $stmt;
    }
    public function getAllOrders($order_id) {
      $query = "SELECT products.name as item, orders.size size, orders.date as date, 
      orders.quant as quant, orders.total as total, orders.status as status, 
      orders.payment as payment FROM products INNER JOIN orders ON products.product_id = orders.product_id 
      WHERE orders.order_id = :order_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':order_id' => $order_id]);
      return $stmt;
    }
    public function getCustomerPassword($cus_email) {
      $query = "SELECT pword FROM customers WHERE email = :email";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':email' => $cus_email]);
      return $stmt->fetchColumn();
    }
    public function getSellerPassword($sel_email) {
      $query = "SELECT pword FROM sellers WHERE email = :email";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':email' => $sel_email]);
      return $stmt->fetchColumn();
    }
    public function getProductQuant($prod_id) {
      $query = "SELECT stock FROM products WHERE product_id = :product_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':product_id' => $prod_id]);
      return $stmt->fetchColumn();
    }
    public function getProductName($prod_name) {
      $query = "SELECT * FROM products WHERE name = :name";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':name' => $prod_name]);
      return $stmt;
    }
    public function laodCartSingle($cus_id) {
      $query = "SELECT cart.cart_id as id, cart.item as item, cart.size as size, cart.price as price, 
      cart.quant as quant, cart.total as total, sellers.fname as shop_name, products.stock as stock FROM cart 
      INNER JOIN sellers ON cart.seller_id = sellers.seller_id INNER JOIN products ON 
      cart.product_id = products.product_id WHERE cart.customer_id = :customer_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':customer_id' => $cus_id]);
      return $stmt;
    }
    public function removeCartNew($cart_id) {
      $query = "DELETE FROM cart WHERE cart_id = :cart_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':cart_id' => $cart_id]);
      return $stmt;
    }
    public function incrementDecrement($quant, $total, $cart_id) {
      $query = "UPDATE cart SET quant = :quant, total = :total WHERE cart_id = :cart_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':quant' => $quant, ':total' => $total, ':cart_id' => $cart_id]);
      return $stmt;
    }
    public function loadAllFromCart($cart_id) {
      $query = "SELECT * FROM cart WHERE cart_id = :cart_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':cart_id' => $cart_id]);
      return $stmt;
    }
    public function deleteSingleCart($cart_id) {
      $query = "DELETE FROM cart WHERE cart_id = :cart_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':cart_id' => $cart_id]);
      return $stmt;
    }
    public function loadCartAll($cus_id) {
      $query = "SELECT GROUP_CONCAT(cart.item SEPARATOR ', ') as items, GROUP_CONCAT(cart.size SEPARATOR ', ') as size, 
      GROUP_CONCAT(cart.quant SEPARATOR ', ') as qty, GROUP_CONCAT(cart.total SEPARATOR ', ') as total, cart.seller_id as seller_id, 
      sellers.fname as shop_name, GROUP_CONCAT(products.stock SEPARATOR ', ') as stock FROM cart INNER JOIN sellers ON cart.seller_id = sellers.seller_id 
      INNER JOIN products ON cart.product_id = products.product_id WHERE cart.customer_id = :customer_id 
      GROUP BY cart.seller_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':customer_id' => $cus_id]);
      return $stmt;
    }
    public function loadCheckBtn() {
      $query = "SELECT * FROM checkbtn";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute();
      return $stmt;
    }
    public function check($check_id) {
      $query = "UPDATE checkbtn SET checked = '1' WHERE check_id = :check_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':check_id' => $check_id]);
      return $stmt;
    }
    public function uncheck($check_id) {
      $query = "UPDATE checkbtn SET checked = '0' WHERE check_id = :check_id";
      $stmt = $this->connect()->prepare($query);
      $stmt->execute([':check_id' => $check_id]);
      return $stmt;
    }
  }
?>
