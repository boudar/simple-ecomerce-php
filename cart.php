<?php require ("includes/connect.php");?>
<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="statics/bootstrap/css/bootstrap.min.css">
    <script src="statics/jquery/jquery-3.6.0.min.js"></script>
    <script src="statics/bootstrap/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="layouts/icons/shopping-cart.png">
    <link rel="stylesheet" href="statics/Css/style.css">
    <title>Cart</title>
</head>
<style>

body{
    background-color:white;
}
#tab{
    position: relative;
    right:80px;
}

</style>
<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand href="#"><span class="lo"><span class="ech">Echo</span>SHOP</span></a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapse">
                <span class="navbar-toggler-icon text-light"><svg width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/></svg>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarcollapse">
                <ul class="navbar-nav ml-auto">
                <ul class="navbar-nav ml-auto mr-3">
                    <li class="nav-item mr-3">
                        <a href="index.php" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item mr-3">
                        <a href="aboutus.php" class="nav-link">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="feedback.php" class="nav-link">Feedback</a>
                    </li>
                </ul>
                    
                </ul>

                <ul class="navbar-nav ml-auto">

                <a href='cart.php' class='nav-link mr-5'><svg width='21' height='21' fill='currentColor' class='bi bi-cart-fill' viewBox='0 0 16 16'>
                            <path d='M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>
                        </svg></a>


                    <?php
                    if (isset($_SESSION['username'])) {
                        $us = $_SESSION['username'];
                    }             
                    
                    if (isset($_SESSION['cart'])) {
                      $c = count($_SESSION['cart']);
                      if ($c>0) {
                        echo '<span class="ncart">'.$c.'</span><li class="nav-item mr-4">';
                     }

                    }
                     
                    //  if ($c>0) {
                    //     echo '<span class="ncart">'.$c.'</span><li class="nav-item mr-4">';
                    //  }
                    // session_start();
                    if (isset($_SESSION['uid'])) {
                        echo "                    
                    <li class='nav-item  mr-2'>
                        <div id='dropdown' class='dropdown text-black'> 
                        
                            <button class='btn btn-secondary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <span class='loggedinas'>Logged in As: $us</span></button> 
                                <div class='dropdown-menu dropdown-menu-right' aria-labelledby='dropdownMenuButton'>
                                    <a href='profile.php' class='dropdown-item'><svg width='21' height='21' fill='currentColor' class='bi bi-box-arrow-in-right' viewBox='0 0 16 16'>
                                        <path fill-rule='evenodd' d='M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z'/>
                                        <path fill-rule='evenodd' d='M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z'/>
                                    </svg> Profile</a> 
                                    <a href='logout.php' class='dropdown-item'><svg width='21' height='21' fill='currentColor' class='bi bi-box-arrow-left' viewBox='0 0 16 16'>
                                        <path fill-rule='evenodd' d='M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z'/>
                                        <path fill-rule='evenodd' d='M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z'/>
                                    </svg> Logout</a> 
                                </div> 
                            </div>
                    </li>";
                    }else {
                        echo '<li class="nav-item mr-3">
                        <a href="register.php" class="nav-link">Register</a>
                    </li>
                    <li class="nav-item">
                        <a href="login.php" class="nav-link">Login</a>
                    </li>';
                    }
                    
                    ?>
                    
                    
                </ul>
            </div>
        </div>
    </nav>
 
    <!-- end of navbar -->
    <div class="container">
<!-- <div class="row" > -->
<table class="table bg-white rounded" id="tab">
<tr><th>shopping bag</th><th>description</th><th>category</th><th>price</th><th>remove</th></tr>
<?php
require "conn.php";
$total = 0;
if (isset($_SESSION['cart'])) {
    
    $mycart = $_SESSION['cart'];
    foreach ($mycart as $id) {
        foreach ($id as $ids) {
            $d = $con->prepare("SELECT * from items where item_id=?");
            $d->execute(array($ids));
            $r = $d->fetch();
            $title = $r['title'];
            $price = $r['price'];
            $description = $r['description'];
            $img = $r['image'];
            $total += $price;
            echo "<tr><td><img class='cartimg' src='admin/uploads/".$r['image']."'></td><td>".$r['description']."</td><td>".$r['category']."</td><td>".$r['price']."DH</td><td><a href='cart.php?remove=$ids'>remove</a></td></tr>";
            
            
        }
    }
}

echo "<tr><th></th><th></th><th></th><th>Total:$total dh</th><th></th></tr>";




if (isset($_GET['buy'])) {
    if (isset($_SESSION['cart'])) {
    $mycart = $_SESSION['cart'];
    foreach ($mycart as $id) {
        foreach ($id as $ids) {
            $d = $con->prepare("SELECT * from items where item_id=?");
            $d->execute(array($ids));
            $r = $d->fetch();
            $title2 = $r['title'];
            $price2 = $r['price'];
            $description2 = $r['description'];
            $img2 = $r['image'];
            $dd = $con->prepare("INSERT INTO requests(title,description,img,price,reqname) VALUES(?,?,?,?,?)");
            $dd->execute(array($title2,$description2,$img2,$price2,$us));
            echo "<script>alert('thank you for Your trust')</script>";
            echo "<script> window.location.replace('cart.php'); </script>";
            unset($_SESSION['cart']);
            
            
            }
        }
    }else {
        echo "<script> window.location.replace('login.php'); </script>";
        
    }
}
   
?>





<?php
if (isset($_GET['remove'])) {
    $rid = $_GET['remove'];
    foreach ($mycart as $key =>$value) {
        if ($value['id'] == $_GET['remove']) {
            unset($_SESSION['cart'][$key]);
            echo "<script> window.location.replace('cart.php'); </script>";
            
        }
           

    }
}


//show all stored items in session cart
// print_r($mycart);

?>


</table>

<!-- </div> -->
</div>
<!--payment form -->



<form class="bg-white">
  <div class="mb-3 offset-md-1">
    <label for="exampleInputEmail1" class="form-label">CARD NUMBER</label>
    <input type="email" class="form-control col-md-5" placeholder="4545454545454545" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3 offset-md-1">
    <label for="exampleInputPassword1" class="form-label">OWNER NAME</label>
    <input type="text" class="form-control col-md-5" id="exampleInputPassword1">
  </div>
  <div class="row ml-1">
  <div class="mb-4 offset-md-1">
    <label for="exampleInputPassword1" class="form-label">EXPIRE DATE</label>
    <input type="text" class="form-control col-md-12" placeholder="mm/yyyy" id="exampleInputPassword1">
  </div>
  <div class="mb-4 offset-md-1">
    <label for="exampleInputPassword1" class="form-label">CVV:</label>
    <input type="text" class="form-control col-md-12" placeholder="cvv" id="exampleInputPassword1">
  </div>  


  </div>
  <a class='buy' href='export.php'>pay <?php echo $total?>DH</a>
</form>

<img src="../electroshop/images/icons/visa.png" alt="" class="visacard">


    <!-- Footer -->
    <div style="min-height: 600px;"></div>
    <footer class="bg-dark text-light pt-3 pb-4">
            <div class="container">
                <div id="footerlink" class="col-md-6 row mb-3 mt-1 ml-auto mr-auto">
                    <a class="mr-1 ml-auto mr-auto" href="index.php">Home</a>
                    <a class="mr-1 ml-auto mr-auto" href="aboutus.php">About Us</a>
                    <a class="mr-1 ml-auto mr-auto" href="index.php#header">Products</a>
                    <a class="ml-auto mr-auto" href="feedback.php">Feedback</a>
                </div>
                <p class="text-center">Check us on Social Media and on Github</p>
                <div id="footsocial" class="col-md-10 row mb-3 mt-2 ml-auto mr-auto">
                    <a class="mr-1 ml-auto mr-auto" href="#"><svg width="35" height="35" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                    <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                    </svg> @TechStore</a>
                    <a class="mr-1 ml-auto mr-auto" href="#"><svg width="35" height="35" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                    <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
                    </svg> @TechStore</a>
                    <a class="mr-1 ml-auto mr-auto" href="#"><svg width="35" height="35" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                    <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                    </svg> @TechStore</a>
                    <a class="ml-auto mr-auto" href="#"><svg width="35" height="35" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                    </svg> @TechStore</a>
                </div>
                <p class="lead text-center">STORE TECH | 2022 &copy;All Rights Reserved</p>
                <p class="text-center">YASSINE BAHMANE | ABDELLAH BOUDAR</p>
            </div>
        </footer>
    </footer>
<div style="height: 10px; background:rgb(47, 97, 236);"></div>
<!-- End of footer -->
</body>

</html>