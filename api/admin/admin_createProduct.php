<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/admin.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate object
$admin = new Admin($db);

//Declare and initialize product values
$admin->productName = $_POST['productName'];
$admin->productPrice = $_POST['productPrice'];
$admin->productDescription = $_POST['productDescription'];

if ($admin->createProduct()) {
  echo json_encode(
    array('message' => 'Product Created')
  );
  header('location: ../../members/adminManageProducts.php');
} else {
  echo json_encode(
    array('message' => 'Product Not created')
  );
}