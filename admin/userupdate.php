<?php 
require "conn.php";
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ../login.php');
}


?>

<?php  include 'includes/templates/header.php'?>

<body>

<?php include 'includes/templates/sidebar.php' ?>
        <!-- /#sidebar-wrapper -->
<?php
        
        require "conn.php";
        $id = $_SESSION['id'];
        $data = $con->prepare("SELECT * FROM users where usertype=1 and id=?");
        $data ->execute(array($id));
        $result = $data->fetch();
        // $photoimage = $result['photo'];
    
?>
        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <h2 class="fs-2 m-0">Admin Panel</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img class="profilephoim" src="../admin/photos/<?php echo $result['photo']; ?>" alt="" srcset=""></i><i class="text-dark"><?php echo $_SESSION['email']?></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="profile.php"><i class="bi bi-person ico"></i></i>Profile</a></li>
                                <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-left ico"></i>Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <div class="row g-3 my-2">
                    <div class="col-md-3">
                       
                    </div>

                    <div class="col-md-3">
                       

                    </div>

                    <div class="col-md-3">
                      
                    </div>

                    <div class="col-md-3">
                      
                    
                </div>
                <?php
                require "conn.php";
                if (isset($_GET['userid'])) {
                    $uid = $_GET['userid'];
                    $d = $con->prepare("SELECT * FROM users WHERE id = ?");
                    $d->execute(array($uid));
                    $r = $d->fetch();
                }
               
                
                ?>

                <div class="row my-1 col-md-8 offset-md-1">
                    <h3 class="fs-3 mb-1">Update User</h3>
                    <div class="col">
                    <form action="" method="post">
            <div class="container rounded mt-5 mb-5">
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <img class="rounded-circle mt-7" width="150px" height="150px" alt="photo ptofile" src="../useruploads/<?php echo $r['photo']?>"></div>
                </div>
                <div class="col-md-9 border-right">
                    <div class="p-3 py-2">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6"><label class="labels">username</label><input type="text" name="username" class="form-control" placeholder="username" value="<?php echo $r['username']?>"></div>
                            <div class="col-md-6"><label class="labels">full name</label><input type="text" name="fullname" class="form-control" value="<?php echo $r['fullname']?>" placeholder="full name"></div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12"><label class="labels">Email</label><input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $r['email']?>"></div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12"><label class="labels">adresse</label><input type="text" name="adresse" class="form-control" placeholder="adresse" value="<?php echo $r['adresse']?>"></div>
                        </div>
                        <div class="mt-5 text-center"><button class="btn btn-primary profile-button" name="upda" type="submit">Update User</button></div>

                    </div>
                                <?php
                                        if (isset($_GET['seccess'])) {
                                            echo '<div class="alert alert-success" role="alert">
                                            User updated seccessfully
                                          </div>';
                                        }
                
                                 ?>
                </div>
            </div>
        </div>
        </div>
        </div>
        </form>
                <?php
                 require "conn.php";
                 if (isset($_POST['upda'])){
                     $uuid = $_GET["userid"];
                     $username = $_POST['username'];
                     $fullname = $_POST['fullname'];
                     $email = $_POST['email'];
                     $adresse = $_POST['adresse'];
                    $data =  $con->prepare("UPDATE users set username=?,fullname=?,email=?,adresse=? WHERE id=?");
                    $data->execute(array($username,$fullname,$email,$adresse,$uuid));
                    echo "<script>window.location.replace('userupdate.php?userid=$uuid&seccess=user updated');</script>";
                 }
                
             ?>
                
                
            
                </div>

            </div>
        </div>
    </div>
  
    <!-- /#page-content-wrapper -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>