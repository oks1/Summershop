<?php
include_once '../config/Database.php';
include_once '../models/admin.php';

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate object
$admin = new Admin($db);
$id = $_GET['id'];
// Category query
$result = $admin->getProductById($id);

// Get row number of result
$num = $result->rowCount();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Summer Shop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- latest compiled and minified CSS -->
  <!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- jquery library -->
  <script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.min.js"></script>
  <!-- Latest compiled and minified javascript -->
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
  <!-- Admin CSS -->
  <link rel="stylesheet" href="../css/admin/style.css">
  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <!-- NEEDED JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>


</head>

<body>

  <nav class="navbar navbar-expand-lg bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon text-white"><i class="bi bi-three-dots"></i></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
          <!-- <a class="nav-link text-white" aria-current="page" href="home.php">Home</a>
        <a class="nav-link text-white" href="adminDashboard.php">Admin Panel</a>
        <a class="nav-link text-white" href="#">Sign Out</a> -->
        </div>
      </div>
    </div>
  </nav>

  <!-- Main: Sidebar + table -->
  <div class="container-fluid bg-secondary">
    <div class="row">
      <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark c_h" style="width:250px;">
        <a class="d-flex align-items-stretch mb-3 mb-md-0 me-md-auto text-white text-decoration-none"
          href="adminDashboard.php"><i class="bi bi-speedometer2 pr-2"></i><span class="fs-4">Admin Panel</span></a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item"><a class="nav-link text-white" href="../index.php" aria-current="page"><i
                class="bi bi-house pr-2"></i>Home</a></li>
          <li><a class="nav-link active text-white" href="#"><i class="bi bi-sunglasses pr-2"></i>Manage
              Products</a></li>
          <li><a class="nav-link text-white" href="adminGetAll.php"><i
                class="bi bi-person-lines-fill pr-2"></i></i>Manage Users</a></li>
          <hr>
          <li><button onclick="window.location.assign('../members/adminManageProducts.php')" type="button"
              class="btn-info p-2 pr-4 pl-4 m-3"><i class="bi bi-tags-fill p-1"></i></i>All Products</button></li>
          <li><button onclick="getOneProduct()" type="button" class="btn-info p-2 pr-4 pl-4 m-3"><i
                class="bi bi-tag-fill p-1"></i></i>Product by id</button></li>
          <li><input id="idBox" name="productId" type="text" class="form-control m-auto col-10"
              placeholder="Enter product ID"></li>
          <li><button onclick="window.location.assign('productCreate.php')" type="button"
              class="btn-warning p-2 pr-4 pl-4 m-3">
              <i class="bi bi-magic p-1"></i>Create Product</button></li>
          <li class="nav-item" id="logout"><a class="nav-link active" href="../api/admin/admin_logout.php"
              aria-current="page"><i class="bi bi-house pr-2"></i>Log out</a></li>
        </ul>
      </div>

      <div class="d-flex flex-grow-1 p-3 ms-auto justify-content-center text-white bg-secondary">
        <div class="row-flex">
          <h2 class="text-center">Products</h2>
          <table class="table table-striped text-white t_s">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Description</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
            <tbody>

              <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
              <tr>
                <td> <?= $row['id']; ?> </td>
                <td> <?= $row['name']; ?> </td>
                <td> <?= $row['price']; ?> </td>
                <td> <?= $row['description']; ?> </td>
                <td> <a href="../members/productupdate.php?id=<?= $row['id'] ?>"><i
                      class="bi bi-vector-pen text-white"></i></a> </td>
                <td> <a href="../api/admin/admin_productDelete.php?id=<?= $row['id'] ?>"><i
                      class="bi bi-trash3-fill text-white"></i></a></td>
              </tr>
              <?php }
                            ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <hr class="bg-dark m-0">
  <footer class="py-3 bg-dark">
    <ul class="nav justify-content-center border-bottom pb-3">
      <!-- <li class="nav-item"><a class="nav-link px-2 text-white" href="home.php">Home</a></li>
            <li class="nav-item"><a class="nav-link px-2 text-white" href="#">Admin Panel</a></li>
            <li class="nav-item"><a class="nav-link px-2 text-white" href="#">Sign Out</a></li> -->
    </ul>
    <p class="text-center text-muted pt-4">@2022 SummerShop Team 4</p>
  </footer>

  <script>
  function getOneProduct() {
    event.preventDefault();
    let productID = document.getElementById('idBox').value;
    if (!productID) {
      alert("Enter product ID");
    } else {
      window.location.assign("../members/adminManageProductByID.php?id=" + productID);
    }
  }
  </script>


</body>

</html>