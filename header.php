
<nav class="navbar navbar-expand-lg bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon text-white"><i class="bi bi-three-dots"></i></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <a href="index.php" class="navbar-brand text-white">Summer Shop</a>
    </div>
      <div class="navbar-nav">

                           <?php
        
                            if(isset($_SESSION['email'])){
                
                           ?>
                           <a class="nav-link text-white" href="myaccount.php"> My account</a>
                           <a class="nav-link text-white" href="myfavorites.php"> Favorite Items</a>
                           <a class="nav-link text-white" href="mycart.php"> Cart</a>
                           <a class="nav-link text-white" href="logout.php"> Logout</a>
                           <?php
                           }else{
                            ?>
                            <a class="nav-link text-white" href="usersignup.php"> Sign Up</a>
                            <a class="nav-link text-white" href="login.php">Login</a>
                           <?php
                           }
                           ?>
      </div>
    </div>
  </div>
</nav> 

