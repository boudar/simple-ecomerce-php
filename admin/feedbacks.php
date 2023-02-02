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
                        
                    </div>

                    <div class="col-md-3">
                        
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
                    <h3 class="fs-4 mb-3">Feedbacks</h3>
                    <div class="col">
                        <table class="table table-dark table-hover" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">Feedback ID</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">username</th>
                                    <th scope="col">view</th>
                                    


                                    



                                </tr>
                            </thead>
                            <tbody>
                                    <?php
                                    $stmt = $con->prepare("SELECT * FROM feedbacks");
                                    $stmt -> execute();
                                    $result = $stmt->fetchAll();
                                    foreach ($result as $info) {
                                        $feedid = $info['feed_id'];
                                        $modal = '<!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary" style="outline:none; box-shadow:none; height:33px" data-bs-toggle="modal" data-bs-target="#'.$info['username'].'">
                                                View
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="'.$info['username'].'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Feedback</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body text-dark"><p>'
                                                       .$info['feed'].
                                                    '</></div>
                                                  
                                                    </div>
                                                </div>
                                                </div>';
                                        echo "<td>".$info['feed_id']."</td>";
                                        echo "<td>".$info['email']."</td>";
                                        echo "<td>".$info['username']."</td>";
                                        echo "<td><a>$modal</a><a class='deluser' onclick='return confirm(\"are you sure you want to delete this feedback? \")' value='delete' href='feeddelete.php?feedid=$feedid'>delete</a></td>";
                                        // echo "<td><a class='deluser' value='delete'>delete</a></td>";
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