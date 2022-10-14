<?php
// include_once "../../connection.php";
session_start();

include_once '../../config/Database.php';
include_once '../../models/cart.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate blog post object
$cart = new Cart($db);

// Category query
// $result = $cart->addQty($_GET['id']);

if ($cart->addQty($_GET['id'])) {
    echo json_encode(
      array('message' => 'Qty +')
    );
    header('location: ../../mycart.php');
} else {
    echo json_encode(
      array('message' => 'Not updated')
    );
  }
// Get row number of result
// $num = $result->rowCount();
// $cart = $result->fetch(PDO::FETCH_ASSOC)
?>