<?php
session_start();
$erro = isset($_SESSION['erro']) ? $_SESSION['erro'] : '';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Summer Shop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- latest compiled and minified CSS -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css">

  <!-- jquery library -->
  <script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.min.js"></script>
  <!-- Latest compiled and minified javascript -->
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
  <!-- External CSS -->
  <link rel="stylesheet" href="">


</head>

<body>


  <br><br><br>

  <div class="container">
    <div class="row">
      <div class="col-xs-6 col-xs-offset-3">
        <div class="panel panel-success ">
          <div class="panel-heading">
            <h3 class="text-center ">Admin Login</h3>
          </div>
          <div class="panel-body">

            <form method="post" action="../api/admin/admin_login_submition.php">
              <div class="form-group">
                <input type="name" class="form-control" name="name" placeholder="Name" pattern="[A-Za-z]{1,10}"
                  title="Must contain letters and 1 to 10 characters">
              </div>
              <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password"
                  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
              </div>
              <span><?php echo $erro ?></span>

              <div class="form-group">
                <input type="submit" value="Login" class="form-control btn-success">
              </div>
            </form>

          </div>
        </div>
      </div>

      <br><br><br><br><br>



</body>

</html>