<?php 
echo "sucess";
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');
  header('Access-Control-Allow-Methods: POST');
  header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

  include_once '../../config/Database.php';
  include_once '../../models/users.php';
  
  session_start();


  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $users = new Users($db);

  // Get raw posted data
  // $data = json_decode(file_get_contents("php://input"));

  $users->name = $_POST['name'];
  $users->email = $_POST['email'];
  $users->password = $_POST['password'];
  $users->address = $_POST['address'];
  $users->phone = $_POST['phone'];

//   $users->status = $data->status;

$result = $users->validEmail();

$num = $result->rowCount();


if ($num > 0) { 
  
  $_SESSION['erro'] = "User with this email exists";
  header('Location: ../../usersignup.php');
 
}else{
  $_SESSION['erro'] = '';
  // Create post
  if($users->signup()) {
    echo json_encode(
      array('message' => 'User Created')
    );

    $_SESSION['email'] = $users->email;
    $_SESSION['password'] = $users->password;
    header('Location: ../../login.php');
  } else {
    echo json_encode(
      array('message' => 'User Not Created')
    );
    header('Location: ../../usersignup.php');
  }
}

//Post
////http://localhost/myblog_php_rest/api/post/create.php
//   {
//     "name" : "test",
//     "email"  : "test@mail.ru",
//     "password" : "111111",
//     "address": "123 Sherbrooke str",
//      "phone" : "213546554",
// 
// }

  ?>