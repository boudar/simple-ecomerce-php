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
                        <!-- <div class="p-3 bg-dark text-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">10</h3>
                                <p class="fs-5">Products</p>
                            </div>
                            <i class="bi bi-people"></i>
                        </div> -->
                        <!-- <div id="curve_chart" style="width: 500px; height: 300px"></div> -->

                    </div>

                    <div class="col-md-3">
                        <!-- <div class="p-3 bg-dark text-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">3899</h3>
                                <p class="fs-5">Registred Users</p>
                            </div>
                            <i class="bi bi-people-fill icop"></i>
                        </div> -->
                    </div>

                    <div class="col-md-3">
                        <!-- <div class="p-3 bg-dark text-white shadow-sm d-flex justify-content-around align-items-center rounded">
                            <div>
                                <h3 class="fs-2">190</h3>
                                <p class="fs-5">Products</p>
                            </div>
                            <i class="bi bi-laptop icop"></i>                        
                        </div>
                    </div> -->
                    
                </div>

                <div class="row my-1 col-md-8 offset-md-1">
                    <h3 class="fs-3 mb-1">Add Products</h3>
                    <div class="col">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                              <label for="product" class="form-label">Product Title</label>
                              <input type="text" id="noneline" class="form-control" placeholder="Title" name="title" id="product" aria-describedby="emailHelp" required="required">
                            </div>
                            
                              
                              <div class="mb-2">
                                <label for="product" class="form-label">Product Description</label>
                                <textarea id="noneline" class="form-control" name="des" id="exampleFormControlTextarea1"  rows="3" placeholder="Description"></textarea>
                            </div>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="product" class="form-label">Product Price</label>
                            <input  type="text" id="noneline" class="form-control" placeholder="Price" name="price"  id="product" aria-describedby="emailHelp">
                          </div>
                          <div class="mb-2">
                            <label for="formFile" class="form-label">Upload image</label>
                            <input class="form-control" type="file" name="image" id="formFile">
                          </div>
                          <div class="mb-2">
                    <select class="form-select" name="category" aria-label="Default select example">
                    <option value="others">others</option>
                    <option value="laptops">laptops</option>
                    <option value="smartphones">smartphones</option>
                    <option value="tablets">tablets</option>
                    <option value="pc gamer">pc gamer</option>

                    </select>
                    </div>
                   
                    
            
                </div>
                    <button type="submit" name="submit" class="btn bg-dark text-white mb-2">Add Product</button>
                </form>
                <?php
                 require "conn.php";
                 if (isset($_POST['submit'])) {
                    $title = $_POST['title'];
                    $price = $_POST['price'];
                    $des = $_POST['des'];
                    $cate = $_POST['category'];
                    $rand = rand(10,1000);
                     $target = "uploads/".basename($rand.$_FILES['image']['name']);
                     $image = $rand.$_FILES['image']['name'];
                     $stm = $con->prepare("INSERT INTO items(title,price,description,category,image) VALUES(?,?,?,?,?)");
                     $stm ->execute(array($title,$price,$des,$cate,$image));
                     if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
                         echo '<div class="alert alert-success" role="alert">
                         The Product is added seccessfully
                       </div>';
                     }else {
                         echo "there is an error";
                     }
                    
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