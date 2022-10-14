<?php
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

$users->email = $_POST['email'];
$users->password = $_POST['password'];

// $email = mysqli_real_escape_string($conn,$_POST['email']);
// $reg_email="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
// if(!preg_match($reg_email, $email)){
//     echo "Incorrect email";
// }

// $password = md5(mysqli_real_escape_string($conn,$_POST['password']));
// $password = mysqli_real_escape_string($conn,$_POST['password']);
// if(strlen($password)<6){
//     echo "password should be longer than 6 chars";
// }

$result = $users->login();

// Get row number of result
$num = $result->rowCount();
// Check if there is any
echo $num;
if ($num > 0) {
    $row = $result->fetch(PDO::FETCH_ASSOC);

    $_SESSION['email'] = $users->email;

    $_SESSION['password'] = $users->password;

    $_SESSION['id'] = $row['id'];
    // $_SESSION['email'] = $users->email;
    // $_SESSION['password'] = $users->password;
   header('Location: ../../index.php');
} else {
    header('Location: ../../login.php');
    // }
   $_SESSION['erro'] = "wrong name or password";
//   header('location: ../../members/adminlogin.php');
}


// if($users->login()) {
//   echo json_encode(
//     array('message' => 'User logged in')
//   );
// } else {
//   echo json_encode(
//     array('message' => 'User Not logged in')
//   );
// }



// $user_query = "SELECT id,email FROM users where email = '$email' and password='$password'";
// $result = mysqli_query($conn, $user_query);

// if(mysqli_num_rows($result)==0){
// echo "wrong email or password";
// header('Location: login.php');
// }else{
//     $myarray = mysqli_fetch_array($result);
//     $_SESSION['email'] = $email;
//     $_SESSION['id'] = $myarray['id'];
//     header('Location:categories.php');
// }


?>