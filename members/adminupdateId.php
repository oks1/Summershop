<?php
session_start();
$erro = '';

include_once '../config/Database.php';
include_once '../models/admin.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate object
$admin = new Admin($db);

// Category query
$result = $admin->getById($_GET['id']);

// Get row number of result
$num = $result->rowCount();
$user = $result->fetch(PDO::FETCH_ASSOC)
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Update</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- latest compiled and minified CSS -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css">

  <!-- jquery library -->
  <script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.min.js"></script>
  <!-- Latest compiled and minified javascript -->
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
  <style>
  body {
    background-color: #343a40;
  }

  .color {
    background-color: #6c757d;
    color: white;
  }

  </style>


</head>

<body>

  <?php
  // require 'header.php';
  ?>

  <br><br><br>

  <div class="container">
    <div class="row">
      <div class="col-xs-6 col-xs-offset-3">
        <div class="panel  color ">
          <div class="panel-heading">
            <h3 class="text-center ">User Update</h3>
          </div>
          <div class="panel-body">

            <form method="post" action='../api/admin/admin_update_id.php?id=<?php echo $_GET['id'] ?>'>
              <div class="form-group">
                <?php
                // Get id
                $id = $user["id"];
                echo '<h4>ID = ' . $id . '</h4>';
                ?>

              </div>
              <div class="form-group">
                <input type="name" class="form-control" name="name" placeholder="Username" pattern="[A-Za-z]{1,10}"
                  title="Must contain letters and 1 to 10 characters" value="<?php echo $user['name']; ?>">
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email" required="true"
                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $user['email']; ?>">
              </div>
              <div class=" form-group">
                <input type="password" class="form-control" name="password" placeholder="Password"
                  value="<?php echo $user['password']; ?>">
              </div>
              <div class=" form-group">
                <input type="text" class="form-control" name="address" placeholder="Address"
                  value="<?php echo $user['address']; ?>">
              </div>
              <div class=" form-group">
                <input type="number" class="form-control" name="phone" placeholder="Phone"
                  value="<?php echo $user['phone']; ?>">
              </div>
              <div class=" form-group">
                <input type="text" class="form-control" name="status" placeholder="Status"
                  value="<?php echo $user['status']; ?>">
              </div>
              <span><?php echo $erro ?></span>

              <div class=" form-group">
                <input type="submit" value="Update" class="form-control btn-info">
              </div>
            </form>

          </div>
        </div>
      </div>

      <br><br><br><br><br>
      <?php
      // require 'footer.php';
      ?>


</body>

</html>