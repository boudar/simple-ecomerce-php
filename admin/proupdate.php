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
// print_r($result);
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
                <?php
                    require "conn.php";
                    if (isset($_GET["productid"])) {
                        $proid = $_GET["productid"];  
                        $d1 = $con->prepare("SELECT * FROM items WHERE item_id=?");
                        $d1->execute(array($proid));
                        $sh = $d1->fetch();

                    }

                ?>
            <div class="container-fluid">
                <div class="row">
                <div class="row my-1 col-md-8 offset-md-1">
                    <h3 class="fs-3 mb-1">Update Products</h3>
                    
                    <div class="mb-4 mt-4">
                    <img style="height:100px; margin-left:250px" src="../admin/uploads/<?php echo $sh['image']; ?>" alt="" srcset=""></i>


                    </div>
                 
                    <div class="col">
                        <form action="#" method="post" enctype="multipart/form-data">
                            <div class="mb-3">
                              <label for="product" class="form-label">Product Title</label>
                              <input type="text" id="noneline" class="form-control" value="<?php echo $sh['title']?>" placeholder="Title" name="title" id="product" aria-describedby="emailHelp" required="required">
                            </div>
                            
                              
                              <div class="mb-2">
                                <label for="product" class="form-label">Product Description</label>
                                <textarea id="noneline" class="form-control" name="des"  id="exampleFormControlTextarea1"  rows="3" placeholder="Description"><?php echo $sh['description']?></textarea>
                            </div>
                    </div>
                    <div class="col">
                        <div class="mb-2">
                            <label for="product" class="form-label">Product Price</label>
                            <input type="text" id="noneline" class="form-control" placeholder="Price" name="price" value="<?php echo $sh['price']?>"  id="product" aria-describedby="emailHelp">
                          </div>
                          <div class="mb-2">
                            <label for="formFile" class="form-label">Upload image</label>
                            <input class="form-control" type="file" name="image" id="formFile">
                          </div>
                          <div class="mb-2">
                    <select class="form-select" aria-label="Default select example">
                    <option selected>Select categorie</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                    </select>
                    </div>
                   
                    
            
                </div>
                    <button type="submit" name="updateproduct" class="btn bg-success text-white mb-2">Update Product</button>
                </form>
    </div>
    </div>
    <?php
    require "conn.php";
    if (isset($_POST['updateproduct'])) {
        $pid=$_GET['productid'];
        $title = $_POST['title'];
        $price = $_POST['price'];
        $des = $_POST['des'];
        $target = "uploads/".basename($_FILES['image']['name']);
        $iimage = $_FILES['image']['name'];
        if (empty($iimage)) {
            $stm = $con->prepare("UPDATE  items SET title = ?, price = ? ,description = ? WHERE item_id=?");
            $stm ->execute(array($title,$price,$des,$pid));
            echo "<script>window.location.replace('pmanager.php#updated');</script>";

        }else {
            $stm = $con->prepare("UPDATE  items SET title = ?, price = ?,image = ?,description = ? WHERE item_id=?");;
            $stm ->execute(array($title,$price,$iimage,$des,$pid));
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
            echo "<script>window.location.replace('pmanager.php#updated');</script>";
        }
    }
    
    
    ?>
    <!-- <script src="../admin/layouts/js/bootstrap.min.js"></script> -->
</body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>

</html>