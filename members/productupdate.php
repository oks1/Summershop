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
$result = $admin->getProductById($_GET['id']);

// Get row number of result
$num = $result->rowCount();
$product = $result->fetch(PDO::FETCH_ASSOC)
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Update Product</title>
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

  <?php
  // require 'header.php';
  ?>

  <br><br><br>

  <div class="container">
    <div class="row">
      <div class="col-xs-6 col-xs-offset-3">
        <div class="panel panel-success ">
          <div class="panel-heading">
            <h3 class="text-center ">Product Update</h3>
          </div>
          <div class="panel-body">

            <form method="post" action='../api/admin/admin_updateProduct.php?id=<?php echo $_GET['id'] ?>'>
              <div class="form-group">
                <?php
                // Get id
                $productID = $product["id"];
                echo '<h4>ID = ' . $productID . '</h4>';
                ?>

              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Product Name" pattern="[A-Za-z0-9 ]+"
                  title="Lower or upper case letters and numbers" value="<?php echo $product['name']; ?>">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="price" placeholder="Price" required="true"
                  pattern="([0-9]*.[0-9]{2})" title="numbers with 2 decimal values(123.45)" value="<?php echo $product['price']; ?>">
              </div>
              <div class=" form-group">
                <input type="text" class="form-control" name="description" placeholder="Description"
                  value="<?php echo $product['description']; ?>">
              </div>
              <span><?php echo $erro ?></span>

              <div class=" form-group">
                <input type="submit" value="updateProduct" class="form-control btn-success">
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