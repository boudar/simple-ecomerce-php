<?php
session_start();
require "conn.php";
if (!isset($_SESSION['uid'])) {
  header("Location: login.php?loggedout=Please login firts");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="layouts/icons/shopping-cart.png">
    <link rel="stylesheet" href="statics/bootstrap/css/bootstrap.min.css">
    <script src="statics/jquery/jquery-3.6.0.min.js"></script>
    <script src="statics/bootstrap/js/bootstrap.min.js"></script>
    <link rel="icon" type="image/x-icon" href="layouts/icons/shopping-cart.png">
    <link rel="stylesheet" href="statics/Css/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
</head>
<style>
  #in:focus{
    box-shadow: none;
    outline: none;
    border: 1px solid red;
  }
  .deleaccount{
    color:red;
  }
  .back{
    margin-left: 20px;
    position:relative;
    top:30px;
    color: black;
    background-color:#32a883;
    text-decoration: none;
    padding: 5px;
    border-radius: 5px 
  }
  body{
    background-color: white
  }
</style>
<body>

<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand href="#"><span class="lo"><span class="ech">Echo</span>SHOP</span></a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarcollapse">
                <span class="navbar-toggler-icon text-light"><svg width="25" height="25" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/></svg>
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarcollapse">
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

<?php

$uid = $_SESSION['uid'];
$d = $con->prepare("SELECT * FROM users where id = ?");
$d->execute(array($uid));
$result = $d->fetch();

// print_r($result);

///get photo to check 
$ph = $result['photo'];

?>

<form action="" method="post" enctype="multipart/form-data">
<div class="container rounded">
    <div class="row">
        <div class="col-md-3 border-right">
            <?php
            if (empty($ph)) {
                echo '<div class="d-flex flex-column align-items-center text-center p-3 py-5"><img class="rounded-circle mt-5" width="150px" src="../electroshop/layouts/icons/profile.png"></div>';

            }else {
                echo "<div class='d-flex flex-column align-items-center text-center p-3 py-5'><img class='rounded-circle mt-5' width='150px' src='useruploads/$ph'></div>";

            }
            ?>
            <input class="form-control" type="file" name="userphoto" id="formFile">
        </div>
        <div class="col-md-9 border-right border-bottom">
            <div class="p-3 py-2">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">username</label><input id="in" type="text" name="username" class="form-control" placeholder="username" value="<?php echo $result['username']?>"></div>
                    <div class="col-md-6"><label class="labels">full name</label><input id="in" type="text" name="fullname" class="form-control" value="<?php echo $result['fullname']?>" placeholder="full name"></div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12"><label class="labels">Email</label><input id="in" type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $result['email']?>"></div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12"><label class="labels">adresse</label><input id="in" type="text" name="adresse" class="form-control" placeholder="adresse" value="<?php echo $result['adresse']?>"></div>
                </div>
                <div class="mt-5 text-center"><input class="btn btn-primary profile-button" name="pupdate" type="submit" value="Update Profile"></div>
                <div class=""><a class='deleaccount' onclick='return confirm("deleting you account well result in deleting all your information! are you sure about that?")' href="deleteaccount.php?id=<?php echo $result['id']?>">Delete my account</a></div>

            </div>
        </div>
    </div>
</div>
</div>
</div>
</form>
<?php
require "conn.php";
$uid = $_SESSION['uid'];
if (isset($_POST['pupdate'])) {
  $username =  $_POST['username'];
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $adresse = $_POST['adresse'];
  $rand = rand(10,1000);
  $target = 'useruploads/'.basename($_FILES['userphoto']['name']);
  $uphoto = $_FILES['userphoto']['name'];
  if (empty($uphoto)) {
    $data = $con->prepare("UPDATE users set username = ?, email= ? , fullname = ?, adresse = ? WHERE id = ?");
    $data->execute(array($username, $email, $fullname,$adresse,$uid));
    echo "<script>window.location.replace('profile.php');</script>";
  }else {
    $data = $con->prepare("UPDATE users set username = ?, email= ? , fullname = ?, adresse = ?,photo=? WHERE id = ?");
    $data->execute(array($username, $email, $fullname,$adresse,$uphoto,$uid));
    move_uploaded_file($_FILES['userphoto']['tmp_name'], $target);
    echo "<script>window.location.replace('profile.php');</script>";
  }

}


?>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
</html>