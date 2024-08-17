<?php
session_start();
if (!isset($_SESSION['admin'])){
    header('Location:/login.php');
    exit();
}else{
  if ($_SESSION['admin'] == 1){}
}

header('Content-type: application/json');
include('../settings.php');
$connection = mysqli_connect($HOST, $USER, $PASSWORD, $DB_NAME);

if ($_POST['action'] == 1){  // create new board
    try{
        $img = $_POST['img'];
        $processor = $_POST['processor'];
        $frequency = $_POST['frequency'];
        $socket = $_POST['socket'];
        $cores = $_POST['cores'];
        $threads = $_POST['threads'];
        $ram_size = $_POST['ram_size'];
        $ram_type = $_POST['ram_type'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
    }catch(Exception $e){
        echo $e;
    }

    ########## VALIDATION ##########
    $cleaned = str_replace(array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '.'), '', $frequency);
    if (!empty($cleaned) or substr_count($frequency, '.') != 1) {
        echo json_encode(array('status'=>'error0'));
        die;
    };

    if (!ctype_digit($cores)){
      echo json_encode(array('status'=>'error'));
        die;
    }

    if (!ctype_digit($threads)){
      echo json_encode(array('status'=>'error'));
        die;
    }

    if (!ctype_digit($ram_size)){
      echo json_encode(array('status'=>'error'));
        die;
    }

    if (!ctype_digit($price)){
      echo json_encode(array('status'=>'error'));
        die;
    }

    if (!ctype_digit($quantity)){
      echo json_encode(array('status'=>'error'));
        die;
    }

    // find max id for img_src (5.jpg or 3.jpg)
    $query = "SELECT MAX(product_id) AS max_product_id FROM products";
    $result = mysqli_query($connection, $query);
    $result = mysqli_fetch_array($result, 2);
    $img_src = $result[0] . ".jpg";
    
    $query= 
    "INSERT INTO products 
    (img_src, 
    processor, 
    frequency, 
    socket, 
    cores, 
    threads, 
    ram_size, 
    ram_type, 
    price, 
    quantity)
     VALUES('$img_src', 
    '$processor', 
    '$frequency', 
    '$socket', 
    '$cores', 
    '$threads', 
    '$ram_size', 
    '$ram_type', 
    '$price', 
    '$quantity')";

    try{
      mysqli_query($connection, $query);

      $file = $_FILES['img'];
      move_uploaded_file($file['tmp_name'], $img_src);
    }catch(Exception $e){
      echo json_encode(array('status'=>'error'));
    }

    echo json_encode(array('status'=>'success'));

  }else if ($_POST['action'] == 2){  // change info about board
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $delete = $_POST['delete'];
    $product_id = $_POST['product_id'];

    if ($delete == 'false'){
      $delete = 1;
    }else{
      $delete = 0;
    }

    $query = 
    "UPDATE products 
    SET price='$price', 
    quantity='$quantity', 
    on_sale='$delete' 
    WHERE product_id = '$product_id'";
    
    try{
      mysqli_query($connection, $query);
    }catch (Exception $e){
      echo json_encode(array('status'=> 'error'));
      die;
    }

    echo json_encode(array('status'=>'success'));

  }else if ($_POST['action'] == 3){  // change order status

    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    $query = "UPDATE orders SET status='$status' WHERE order_id='$order_id'";

    mysqli_query($connection, $query);

    echo json_encode(array('status'=>'success'));

  }else if($_POST['action'] == 4){

    $personal_num = $_POST['personal_num'];
    $status = $_POST['status'];

    $query = "SELECT status, product_id from reservations WHERE personal_num=$personal_num";
    $result = mysqli_query($connection, $query);

    ####################################
    if (mysqli_num_rows($result) == 1){
      $result = array(mysqli_fetch_array($result,1)); // works only that
    }

    foreach($result as $row){

      $product_id = $row['product_id'];

      if (($row['status'] == '2') and ($status != '2')){
        $query = "UPDATE products SET quantity=quantity+1 WHERE product_id='$product_id'";

      }else if ($row['status'] != '2' and $status == '2'){
        $query = "UPDATE products SET quantity=quantity-1 WHERE product_id='$product_id'";
      }

      try{
        mysqli_query($connection, $query);
      }catch(Exception $e){
        echo json_encode(array('status'=>'error'));
        die;
      }

    }

    $query = "UPDATE reservations SET status=$status WHERE personal_num=$personal_num ";
    mysqli_query($connection, $query);

    echo json_encode(array('status'=>'success'));
  }
?>