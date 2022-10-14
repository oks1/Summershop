<?php
echo "connection good";

session_start();

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once '../../config/Database.php';
include_once '../../models/users.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate object
$user = new Users($db);


// Get id
$id = $_GET["id"];

$user->id = $id;
$user->name = $_POST['name'];
 //$user->email = $_POST['email'];
$user->password = $_POST['password'];
$user->address = $_POST['address'];
$user->phone = $_POST['phone'];
//$user->userStatus = $_POST['status'];

if ($user->update()) {
  echo json_encode(
    array('message' => 'User updated')
  );
  //header('location: ../../myaccount.php?id=' . $id);
  header('location: ../../myaccount.php');
} else {
  echo json_encode(
    array('message' => 'User Not updated')
  );
}