<?php 
require "conn.php";
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ../login.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="../admin/layouts/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="../admin/layouts/images/shopping-cart.png">

    <link rel="stylesheet" href="../admin/layouts/css/styles.css" />
    <title>Edit Profile</title>
</head>

<style>
    form{
        margin-left: 190px;
    }
    .prof{
        width: 80px;
        height: 80px;
    }
    .img-thumbnail{
        width: 120px;
    }
</style>
<body>
<?php
require "conn.php";
$id = $_SESSION['id'];
$data = $con->prepare("SELECT * FROM users where usertype=1 and id=?");
$data ->execute(array($id));
$result = $data->fetch();
// $photoimage = $result['photo'];
// print_r($result);
?>
<div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class="bg-dark" id="sidebar-wrapper">
            <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom">
            <img src="../admin/layouts/images/logo.png" class="logor"></div>
                <div class="list-group list-group-flush my-3">
                <a href="dash.php" class="list-group-item list-group-item-action bg-transparent second-text side ">
                <img src="../admin/layouts/images/team.png" class="sideico"></i id="side">Manage Users</a>
                <a href="products.php" class="list-group-item list-group-item-action bg-transparent second-text side">
                <img src="../admin/layouts/images/carts.png" class="sideico">add products</a>
                <a href="deliver.php" class="list-group-item list-group-item-action bg-transparent second-text side">
                <img src="../admin/layouts/images/bar-graph.png" class="sideico"></i>Requests</a>
                    <a href="pmanager.php" class="list-group-item list-group-item-action bg-transparent second-text side">
                    <img src="../admin/layouts/images/clipboard.png" class="sideico">Manage products</a>
                    <a href="feedbacks.php" id="itemside" class="list-group-item list-group-item-action  second-text side">
                    <img src="../admin/layouts/images/review.png" class="sideico">Feedbacks & reports</a>
            </div>
        </div>
        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-2 px-2">
                <div class="d-flex align-items-center">
                    <h2 class="fs-2 m-0">Admin Panel</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-1 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="profilephoim" src="../admin/photos/<?php echo $result['photo']; ?>" alt="" srcset=""></i></i><?php echo $_SESSION['email']?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="profile.php"><i class="bi bi-person ico"></i></i>Profile</a></li>
                                <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-left ico"></i>Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- <div class="container-fluid px-4"> -->
<?php
// require "conn.php";
// $id = $_SESSION['id'];
// $data = $con->prepare("SELECT * FROM users where usertype=1 and id=?");
// $data ->execute(array($id));
// $result = $data->fetch();

?>
<form action="" method="post" enctype="multipart/form-data">
<div class="container rounded   mb-2">
    <div class="row">
        <div class="col-md-8">
            <div class="d-flex flex-column align-items-center text-center"><img class="rounded-circle mt-5" width="100px" height="100px" src="../admin/photos/<?php echo $result['photo']; ?>"></div>
        </div>
        <div class="col-md-9 border-right">
            <div class="p-3 py-2">
            <div class="col-md-3"><input class="form-control" type="file" name="profilephoto" id="formFile"></div>
                <div class="row mt-3">
                    <div class="col-md-6"><label class="labels">username</label><input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $result['username']?>"></div>
                    <div class="col-md-6"><label class="labels">full name</label><input type="text" class="form-control" value="<?php echo $result['fullname']?>" placeholder="full name"></div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-12"><label class="labels">Email</label><input name="email" type="text" class="form-control" placeholder="Email" value="<?php echo $result['email']?>"></div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-12"><label class="labels">adresse</label><input type="text" name="adresse" class="form-control" placeholder="adresse" value="<?php echo $result['adresse']?>"></div>
                    

                </div>
                <div class="mt-5 text-center"><input class="btn btn-success profile-button" name="update" type="submit" value="Update Profile"></div>

            </div>
      
</div>
</div>
</div>
</form>
<?php
   require "conn.php";
   if (isset($_POST['update'])) {
    $id= $_SESSION['id'];
      $username = $_POST['username'];
      $email = $_POST['email'];
      $adresse = $_POST['adresse'];
    //   $rand = rand(10,1000);
       $target = "photos/".basename($_FILES['profilephoto']['name']);
       $photo = $_FILES['profilephoto']['name'];

       if (empty($photo)) {
        $stm = $con->prepare("UPDATE users set username=? , email=?, adresse=? WHERE usertype=1 AND id=?");
        $stm ->execute(array($username,$email,$adresse,$id));
        echo "<script>window.location.replace('profile.php');</script>";
       }else {
        $stm = $con->prepare("UPDATE users set username=? , email=?, adresse=?, photo=? WHERE usertype=1 AND id=?");
        $stm ->execute(array($username,$email,$adresse,$photo,$id));
        move_uploaded_file($_FILES['profilephoto']['tmp_name'], $target);
        echo "<script>window.location.replace('profile.php');</script>";
       }
   }
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

</html>