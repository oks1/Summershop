<?php
echo "conneciton good";
session_start();
$userArray = isset($_SESSION['userArray']) ? $_SESSION['userArray'] : array();

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/admin.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate object
$admin = new Admin($db);


// Get id
$id = $_GET["id"];

$admin->userID = $id;

if ($admin->delete()) {
  echo json_encode(
    array('message' => 'Post deleted')
  );

  header('location: ../../members/adminGetAll.php');
} else {
  echo json_encode(
    array('message' => 'Post Not deleted')
  );
}

// If you want to test in postman, please comment //header('location: ../../members/adminpanel.php'); should be in line 33

//Delete
//http://localhost:81/Test/ProjectPHP/api/admin/admin_delete.php?id=1