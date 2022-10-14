<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
session_start();
include_once '../../config/Database.php';
include_once '../../models/favorites.php';
// include_once '../../connection.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate object
$favorites = new favorites($db);
// echo $_SESSION['product_id'];
//Declare and initialize product values
// $favorites->id = $_POST['id'];
$favorites->user_id = $_SESSION['id'];
$favorites->product_id = $_GET ['id'];


if ($favorites->create()) {
  echo json_encode(
    array('message' => 'Product added')
  );
  header('Location: ../../index.php');
} else {
  echo json_encode(
    array('message' => 'Product Not added')
  );
}