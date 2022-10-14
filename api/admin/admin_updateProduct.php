<?php
echo "connection good";

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/admin.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate object
$admin = new Admin($db);


// Get id
$productID = $_GET["id"];

$admin->productID = $productID;
$admin->productName = $_POST['name'];
$admin->productPrice = $_POST['price'];
$admin->productDescription = $_POST['description'];

if ($admin->updateProduct()) {
  echo json_encode(
    array('message' => 'Product updated')
  );
  header('location: ../../members/adminManageProducts.php');
} else {
  echo json_encode(
    array('message' => 'Product Not updated')
  );
}
