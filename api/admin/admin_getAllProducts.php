<?php
echo "good";
session_start();

//headers for accessing http
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

include_once '../../config/Database.php';
include_once '../../models/admin.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate object
$admin = new Admin($db);

// Category query
$result = $admin->getAll();

// Get row number of result
$num = $result->rowCount();

// Check if there is any

if ($num > 0) {
  $userArry = array();
  // Fetch data
  while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    extract($row);
    $userItem = array(
      'id' => $id,
      'name' => $name,
      'email' => $email,
      'password' => $password,
      'address' => $address,
      'phone' => $phone,
      'status' => $status

    );
    array_push($userArry, $userItem);
    $_SESSION['userArray'] = $userArry;

    header('location: ../../members/adminpanel.php');
  }
  echo json_encode($userArry);
} else {
  echo json_encode(array('message' => 'Nothing found'));
}


// If you want to test in postman, please comment //header('location: ../../members/adminpanel.php'); should be in line 45
//Get
//http://localhost:81/Test/ProjectPHP/api/admin/admin_getAllUsers.php