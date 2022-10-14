<?php
session_start();
include_once 'config/Database.php';
include_once 'models/admin.php';

// include_once 'connection.php';
include_once 'checkifadded.php';
include_once 'checkifaddedcart.php';


// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate object
$admin = new Admin($db);

// Category query
$result = $admin->getAllProducts();

// Get row number of result
$num = $result->rowCount();
function testfun($i)
{
  echo $i;
}


?>
<!DOCTYPE html>
<html>

<head>
  <title>Summer Shop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- jquery library -->
  <script type="text/javascript" src="bootstrap/js/jquery-3.2.1.min.js"></script>
  <!-- Latest compiled and minified javascript -->
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <!-- External CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="css/style.css" type="text/css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <style>
    .product-container {
      display: grid;
      grid-template-rows: auto;
      gap: 2rem;
      place-items: center;
      margin: auto;
      padding: 2rem;
    }

    @media (min-width: 500px) {
      .product-container {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (min-width: 800px) {
      .product-container {
        grid-template-columns: repeat(3, 1fr);
      }
    }

    @media (min-width: 1100px) {
      .product-container {
        grid-template-columns: repeat(4, 1fr);
      }
    }

    @media (min-width: 1300px) {
      .product-container {
        grid-template-columns: repeat(5, 1fr);
      }
    }

    .product-card {
      border: 1px solid orange;
      box-shadow: rgba(0, 0, 0, 0.35) 0px 10px 20px;
      text-align: center;
      background-color: whitesmoke;
      color: orangered;
      font-family: Georgia, 'Times New Roman', Times, serif;
      width: 250px;

    }

    .photo {
      background-size: cover;
      width: 250px;
      height: 200px;
    }

    hr {
      padding: 0;
      margin: .5rem;
    }
  </style>

</head>

<body>
  <div>
    <?php
    require 'header.php';

    ?>
  </div>
  <div class="product-container">
    <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
      <div class="product-card">
        <div class="photo" style="background-image: url(images/admin_img/product<?= $row['id'];
                                                                                $i = $row['id'];
                                                                                $_SESSION['product_id'] = $i; ?>.jpg)"></div>

        <div class="product_name h4"> <?= $row['name']; ?> </div>
        <div class="product_price h5"> <?= $row['price']; ?> $</div>
        <div class="description"> <?= $row['description']; ?> </div>
        <hr>

        <?php if (!isset($_SESSION['email'])) {  ?>

          <p><a href="login.php" role="button" class="btn btn-primary btn-block">Add to favorites</a></p>
          <p><a href="login.php" role="button" class="btn btn-primary btn-block">Add to cart</a></p>

          <?php

        } else {

          if (check_if_added_to_cart($row['id']) && check_if_added_to_favorites($row['id'])){

            echo '<a href="#" class=btn btn-block btn-success disabled>Added to favorites</a>'; 
            echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';?>
        <!-- <a href="api/users/addfavorites.php?id=$row['id']" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a> -->
    <?php
  
        } else {
            if(!check_if_added_to_cart($row['id']) && check_if_added_to_favorites($row['id'])){
              echo '<a href="#" class=btn btn-block btn-success disabled>Added to favorites</a>';?>
              <a href="api/cart/cart_add.php?id=<?= $row['id'] ?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
         
         <?php  }else{
             if(check_if_added_to_cart($row['id']) && !check_if_added_to_favorites($row['id'])){ ?>
              <a href="api/users/addfavorites.php?id=<?= $row['id'] ?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to favorites</a>
              <?php  echo '<a href="#" class=btn btn-block btn-success disabled>Added to cart</a>';
         
        }else{
            if(!check_if_added_to_cart($row['id']) && !check_if_added_to_favorites($row['id'])){ ?>
              <a href="api/users/addfavorites.php?id=<?= $row['id'] ?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to favorites</a>
             <a href="api/cart/cart_add.php?id=<?= $row['id'] ?>" class="btn btn-block btn-primary" name="add" value="add" class="btn btn-block btr-primary">Add to cart</a>
            <?php }
          }
          }
        }
      }
        ?>
             
      </div>
    <?php  
  }
    ?>
  </div>

  <hr class="bg-dark m-0">
  <footer class="py-3 bg-dark">
    <ul class="nav justify-content-center border-bottom pb-3">
      <li class="nav-item"><a class="nav-link px-2 text-white" href="#">Home</a></li>
      <li class="nav-item"><a class="nav-link px-2 text-white" href="members/adminlogin.php">Admin Panel</a></li>
      <li class="nav-item"><a class="nav-link px-2 text-white" href="#">Sign Out</a></li>
    </ul>
    <p class="text-center text-muted pt-4">@2022 SummerShop Team 4</p>
  </footer>

</body>

</html>