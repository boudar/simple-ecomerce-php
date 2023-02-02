<?php 
require "conn.php";
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: ../login.php');
}

?>

<?php  include 'includes/templates/header.php'?>

<body>

<?php include 'includes/templates/sidebar.php'?>

        <!-- /#sidebar-wrapper -->
        <!-- Page Content -->
        <?php
require "conn.php";
$id = $_SESSION['id'];
$data = $con->prepare("SELECT * FROM users where usertype=1 and id=?");
$data ->execute(array($id));
$result = $data->fetch();
// $photoimage = $result['photo'];
// print_r($result);
?>
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
                                <img class="profilephoim" src="../admin/photos/<?php echo $result['photo']; ?>" alt="" srcset=""></i><?php echo $_SESSION['email']?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="profile.php"><i class="bi bi-person ico"></i></i>Profile</a></li>
                                <li><a class="dropdown-item" href="logout.php"><i class="bi bi-box-arrow-left ico"></i>Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                
            </nav>

            <div id="cont" class="container-fluid px-4">
                
                <div class="row ">
                <div class="col-md-3">
                        <!-- <div class="p-3 bg-dark text-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">720</h3>
                                <p class="fs-5">Users</p>
                            </div>
                            <i class="bi bi-people"></i>
                        </div> -->
                    </div>

                    <div class="col-md-3">
                        <!-- <div class="p-3 bg-dark text-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">10</h3>
                                <p class="fs-5">Products</p>
                            </div>
                            <i class="bi bi-people"></i>
                        </div> -->
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-dark text-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <?php
                                  $stmt = $con->prepare("SELECT COUNT(id) FROM users WHERE usertype!=1");
                                  $stmt -> execute();
                                  $result = $stmt->fetch();
                                echo "<h3 class='fs-2'>".$result['COUNT(id)']."</h3>";
                                ?>
                                <p class="fs-5">Registred Users</p>
                            </div>
                            <i class="bi bi-people-fill icop"></i>
                        </div>
                    </div>

                    <div class="col-md-3">
                        
                    </div>
                </div>

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Latest Registred Users</h3>
                    <div class="col">
                        <table class="table table-dark table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">full name</th>
                                    <th scope="col">username</th>
                                    <th scope="col">email</th>
                                    <th scope="col">address</th>
                                    <th scope="col">date</th>
                                    <th scope="col">Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    $stmt = $con->prepare("SELECT * from users WHERE usertype!=1 ORDER BY id DESC");
                                    $stmt -> execute();
                                    $result = $stmt->fetchAll();
                                    foreach ($result as $info) {
                                        $id= $info['id'];
                                        echo "<tr>";
                                        echo "<td>".$info['id']."</td>";
                                        echo "<td>".$info['username']."</td>";
                                        echo "<td>".$info['fullname']."</td>";
                                        echo "<td>".$info['email']."</td>";
                                        echo "<td>".$info['adresse']."</td>";
                                        echo "<td>".$info['rdate']."</td>";
                                        echo "<td><a id='texto' onclick='return confirm(\"are you sure you want to delete this user? \")' class='deluser' href='delete.php?userid=$id&operation=delete'>delete</a> 
                                        <a class='updauser'  href='userupdate.php?userid=$id'>update</a> <a onclick='return confirm(\"are you sure you want to promot this user? \")'  class='promot' href='promot.php?userid=$id'>promote</a></td>";
                                        echo "<tr>";
                                    }
                                    ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    
    </div>

    <!-- <script src="../admin/layouts/js/bootstrap.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <a name="deleted"></a>
</body>

</html>