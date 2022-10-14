<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Create Product</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- latest compiled and minified CSS -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css">

  <!-- jquery library -->
  <script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.min.js"></script>
  <!-- Latest compiled and minified javascript -->
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
  <!-- External CSS -->
  <link rel="stylesheet" href="">

  <style>

body {

  background-color: #343a40;

}

.color {

  background-color: #6c757d;

  color: white;

}

.btn-color {

  background-color: gray;

  color: white;

  font-weight: bolder;

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
        <div class="panel color">
          <div class="panel-heading">
            <h3 class="text-center ">Create Product</h3>
          </div>
          <div class="panel-body bg-secondary">

            <form method="post" action='../api/admin/admin_createProduct.php'>
              <div class="form-group">

              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="productName" placeholder="Product Name" pattern="[A-Za-z0-9 ]+"
                  title="Lower or upper case letters and numbers" required value="">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="productPrice" placeholder="Price" required="true"
                  pattern="([0-9]*.[0-9]{2})" title="numbers with 2 decimal values(123.45)" value="">
              </div>
              <div class=" form-group">
                <input type="text" class="form-control" name="productDescription" placeholder="Description"
                  value="">
              </div>

              <div class=" form-group">
                <input type="submit" value="Create Product" class="form-control btn-info">
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