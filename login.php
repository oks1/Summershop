<?php
include_once "config/Database.php";
include_once 'models/users.php';
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>Login</title>
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
    <br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3>LOGIN</h3>
                    </div>
                    <div class="panel-body">
                    <form method="post" action="api/users/login-submit.php">
                      
                    </div>
                    <div class="form-group">
                    <!-- <input type="text" class="form-control" name="email" placeholder="Email"> -->
                        <input type="email" class="form-control" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                    </div>
                    <div class="form-group">
                    <!-- <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)"> -->
                        <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" pattern=".{6,}">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Login" class="btn btn-primary">
                    </div>
                    </form>
                </div>
                <div class="panel-footer">Don't have an account yet? <a href="usersignup.php">Register</a></div>
            </div>
        </div>
    </div>
    </div>
    <br><br><br><br><br>
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