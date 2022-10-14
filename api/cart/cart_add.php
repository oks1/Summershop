<?php
 header('Access-Control-Allow-Origin: *');
 header('Content-Type: application/json');
 header('Access-Control-Allow-Methods: POST');
 header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');


// include_once "../../connection.php";
session_start();

include_once '../../config/Database.php';
include_once '../../models/cart.php';



// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$cart = new Cart($db);

// $cart->user_id=$_SESSION['id'];
// $product_id=$_GET['id'];
// Get raw posted data
// $data = json_decode(file_get_contents("php://input"));

// $cart->user_id = $data->user_id;
$cart->user_id = $_SESSION['id'];
$cart->product_id = $_GET['id'];
// $cart->user_id = $data->product_id;
// $cart->qty = $data->qty;
// $cart->status = $data->status;

// Create post
if($cart->create()) {
    
    // header('location:cart.php');
    echo json_encode(
    array('message' => 'cart Created')
  );
  header('location: ../../index.php');
} else {
  echo json_encode(
    array('message' => 'cart Not Created')
  );
}



?>