<?php
echo "connection good";

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
$result = $admin->getById($id);
$user = $result->fetch(PDO::FETCH_ASSOC);

$admin->userStatus = $user['status'] == 'unblocked' ? 'blocked' : 'unblocked';


if ($admin->activeBlock()) {
  echo json_encode(
    array('message' => 'Post updated')
  );
  header('location: ../../members/adminGetAll.php');
} else {
  echo json_encode(
    array('message' => 'Post Not updated')
  );
}