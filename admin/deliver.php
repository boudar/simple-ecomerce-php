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
            <div class="col-md-3 offset-md-6">
            <div class="p-3 bg-dark text-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                            <?php
                                  $stmt1 = $con->prepare("SELECT COUNT(req_id) FROM requests");
                                  $stmt1 -> execute();
                                  $result2 = $stmt1->fetch();
                                //   print_r($result2);
                                echo "<h3 class='fs-2'>".$result2['COUNT(req_id)']."</h3>";
                                ?>
                                
                                <p class="fs-5">Requests</p>
                            </div>
                            <i class="bi bi-laptop icop"></i>                        
                        </div>
                    </div>
              

                <div class="row my-5">
                    <h3 class="fs-4 mb-3">Manage Products</h3>
                    <div class="col">
                        <table class="table table-dark table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">Image</th>
                                    <th scope="col">price</th>
                                    <th scope="col">title</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Buyer</th>
                                    <th scope="col">Deliver</th>
                                    


                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    $stmt = $con->prepare("SELECT * from requests");
                                    $stmt -> execute();
                                    $result = $stmt->fetchAll();
                                    foreach ($result as $info) {
                                        $id= $info['req_id'];
                                        echo "<tr>";
                                        echo "<td><img class='pimage' src='uploads/".$info['img']."'></td>";
                                        echo "<td>".$info['price']."</td>";
                                        echo "<td>".$info['title']."</td>";
                                        echo "<td>".$info['description']."</td>";
                                        echo "<td>".$info['reqname']."</td>";
                                        echo "<td><a id='texto' onclick='return confirm(\"are you sure you want to deliver this ? \")' class='updauser' href='deliveritem.php?deliverid=$id'>Deliver</a> 
                                        </td>";
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