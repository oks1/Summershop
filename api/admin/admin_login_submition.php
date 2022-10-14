<?php
//echo "sucess";
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

// Get name and password
$admin->name = $_POST["name"];
$admin->password = $_POST["password"];

// Get result
$result = $admin->login();

// Get row number of result
$num = $result->rowCount();

// Check if there is any

if ($num > 0) {
  $_SESSION['erro'] = '';
  header('location: ../../members/adminDashboard.php');
  $_SESSION['admin'] = 'admin';
} else {
  $_SESSION['erro'] = "wrong name or password";
  header('location: ../../members/adminlogin.php');
}
