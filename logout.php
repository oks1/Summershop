<?php
session_start();
session_unset();
session_destroy();

include_once '../../config/Database.php';
include_once '../../models/users.php';

$logged=0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Logout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <!-- jquery library -->
        <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
        <!-- Latest compiled and minified javascript -->
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
        <!-- External CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
        <link rel="stylesheet" href="css/style.css" type="text/css">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</head>
<body>
<?php  
        
        require 'header.php';
    ?>
    <p>You logged out</p>

    <?php  
       header('Location: index.php');
    ?>

<footer class="py-3 bg-dark">
        <ul class="nav justify-content-center border-bottom pb-3">
            <li class="nav-item"><a class="nav-link px-2 text-white" href="home.php">Home</a></li>
            <li class="nav-item"><a class="nav-link px-2 text-white" href="adminDashboard.php">Admin Panel</a></li>
            <li class="nav-item"><a class="nav-link px-2 text-white" href="#">Sign Out</a></li>
        </ul>
        <p class="text-center text-muted pt-4">@2022 SummerShop Team 4</p>
    </footer>
</body>
</html>