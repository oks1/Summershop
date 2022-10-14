<?php
session_start();
// $userArray = isset($_SESSION['userArray']) ? $_SESSION['userArray'] : array();

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/favorites.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate object
$favorites = new favorites($db);


// Get id
$id = $_GET["id"];
$favorites->productID = $id;

if ($favorites->deleteFavorites()) {
  echo json_encode(
    array('message' => 'Product deleted')
  );

  header('location: ../../myfavorites.php');
} else {
  echo json_encode(
    array('message' => 'Product Not deleted')
  );
}

// If you want to test in postman, please comment //header('location: ../../members/adminpanel.php'); should be in line 33

//Delete
//http://localhost:81/Test/ProjectPHP/api/admin/admin_delete.php?id=1