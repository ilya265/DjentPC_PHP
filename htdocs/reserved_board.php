<?php
header('Content-Type: application/json');
include('../settings.php');
// print_r(json_encode($_POST['data']));


// check if product exists in database
$query = 'SELECT * FROM products WHERE (';

foreach ($_POST['data'] as $item) {
    $query .= "product_id = $item OR ";
};

$query = substr($query, 0, -3);
$query .= ') AND quantity > 0 AND on_sale = 1';

try {
    $connection = mysqli_connect($HOST, $USER, $PASSWORD, $DB_NAME);
} catch (Throwable) {
    echo json_encode(array('response' => "error1 $err"));
    die;
}

try {
    $result = mysqli_query($connection, $query);
    $result = mysqli_fetch_all($result);
} catch (Throwable $err) {
    echo json_encode(array('response' => "error"));
    die;
}

if (count($result) != count($_POST['data'])) {
    echo json_encode(array('response' => "error3 $err", 'test'=> count($result). ' ' . count($_POST['data'])));
    die;
}

## generation of new personal_number
$personal_num = random_int(00000, 99999);
$query = "SELECT personal_num from reservations WHERE personal_num = $personal_num";

try {
    $result = mysqli_query($connection, $query);
} catch (Throwable $err) {
    echo json_encode(array('response' => "error4  $err"));
};

while (mysqli_num_rows($result) != 0) {
    $personal_num = random_int(00000, 99999);
    $query = "SELECT personal_num from reservations WHERE personal_num = $personal_num";
    $result = mysqli_query($connection, $query);
}

$query = "INSERT INTO reservations (product_id, personal_num) VALUES";
foreach ($_POST['data'] as $value) {
    $query .= ("($value, '$personal_num'),");
};

$query = substr($query, 0, -1);

mysqli_query($connection, $query);

// minus one product in database
$query = 'UPDATE products SET quantity = quantity - 1 WHERE product_id IN (';

foreach ($_POST['data'] as $value) {
    $query .= ("$value,");

    $query = substr($query, 0, -1);
    $query .= ')';
    mysqli_query($connection, $query);
};

echo json_encode(array('personal_num' => $personal_num, 'status' => 'success'));
