<?php
include_once "config/Database.php";
include_once 'models/users.php';
session_start();
$erro = isset($_SESSION['erro']) ? $_SESSION['erro'] : '';


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Sign up</title>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>
</head>

<body>
  <?php
    require 'header.php';

    ?>

  <br><br>
  <div class="container">
    <div class="row">
      <div class="col-xs-4 col-xs-offset-4">
        <h1><b>SIGN UP</b></h1>
        <form method="post" action="api/users/signup.php">
          <!-- <form method="post" action="<?php echo ($_SERVER["PHP_SELF"]); ?>"> -->
          <div class="form-group">

            <span style="color:red;"><?php echo $erro ?></span>

          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Name" required="true">
          </div>
          <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Email"
              pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Please enter the following pattern @">
            <!-- <input type="email" class="form-control" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$"> -->
          </div>
          <div class="form-group">
            <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)"
              pattern=".{6,}" title="Password must be more than 6 characters">
            <!-- <input type="password" class="form-control" name="password" placeholder="Password(min. 6 characters)" required="true" pattern=".{6,}"> -->
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Address">
            <!-- <input type="password" class="form-control" name="cpassword" placeholder="Confirm Password(min. 6 characters)" required="true" pattern=".{6,}"> -->
          </div>
          <div class="form-group">
            <input type="tel" class="form-control" name="phone" placeholder="Phone (000-000-0000)" required="true"
              pattern="^[0-9]{3}-[0-9]{3}-[0-9]{4}$" title="Please enter the following pattern 000-000-0000">
          </div>
          <!-- <div class=" form-group">
            <input type="text" class="form-control" name="city" placeholder="City" required="true">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" name="address" placeholder="Address" required="true">
          </div> -->
          <div class="form-group">
            <input type="submit" name="submit" class="btn btn-primary" value="Sign Up">
          </div>
        </form>
      </div>
    </div>
  </div>
  <br><br><br><br><br><br>


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