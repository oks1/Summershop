<?php
include_once 'config/Database.php';
include_once 'models/favorites.php';
session_start();

// Instantiate DB & connect
$database = new Database();
$db = $database->connect();

// Instantiate object
$favorites = new favorites($db);

// Category query
$result = $favorites->getFavorites();


// Get row number of result
$num = $result->rowCount();



// echo $_SESSION['id'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>My favorites</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- latest compiled and minified CSS -->
  <!-- <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css" type="text/css"> -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <!-- jquery library -->
  <script type="text/javascript" src="../bootstrap/js/jquery-3.2.1.min.js"></script>
  <!-- Latest compiled and minified javascript -->
  <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>

  <!-- Bootstrap icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
  <!-- NEEDED JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
  </script>
  <style>
  .pic {
    width: 1rem;

  }

  .pic2 {
    margin-left: 20px;
    text-align: right;
  }

  .pic:hover {
    background-color: #04AA6D;
  }
  </style>
</head>

<body>
<?php  
  require 'header.php';
?>

<div class="d-flex flex-grow-1 p-3 ms-auto justify-content-center text-white bg-secondary">
                <div class="row-flex">
                    <h2 class="text-center">My Favorites</h2>
                    <table class="table table-striped text-white">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        <?php 
                  if ($num > 0) {
                    $userArry = array();
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) { 
			              echo	"<tr>";
                    echo "<td>" . $row["product_id"] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['description']. "</td>";
                    echo "<td> <a href='api/users/deletefavorites.php?id=$row[product_id]?>'><i class='bi bi-trash3-fill text-white'></i></a></td>";
                    echo "</td>";
                    echo "</tr>";
                  }
                }
                ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>

<hr class="bg-dark m-0">
<footer class="py-3 bg-dark">
    <ul class="nav justify-content-center border-bottom pb-3">
      <li class="nav-item"><a class="nav-link px-2 text-white" href="home.php">Home</a></li>
      <li class="nav-item"><a class="nav-link px-2 text-white" href="#">Admin Panel</a></li>
      <li class="nav-item"><a class="nav-link px-2 text-white" href="#">Sign Out</a></li>
    </ul>
    <p class="text-center text-muted pt-4">@2022 SummerShop Team 4</p>
  </footer> 

  <!-- <div class="container-fluid bg-secondary">
    <div class="row">
       
    <div class="d-flex flex-grow-1 p-3 ms-auto justify-content-center text-white bg-secondary">
                <div class="row-flex">
                    <h2 class="text-center">Products</h2>
                    <table class="table table-striped text-white">
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
                    <td> <a href="../members/productupdate.php?id=<?= $row['id']?>"><i class="bi bi-vector-pen text-white"></i></a> </td>
                    <td> <a href="../api/admin/admin_productDelete.php?id=<?= $row['id']?>"><i class="bi bi-trash3-fill text-white"></i></a></td>
				</tr>
				<?php }
			 ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>

  

</body>

</html>