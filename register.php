<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../electroshop/layouts/css/style.css">
    <link rel="icon" type="image/x-icon" href="layouts/icons/shopping-cart.png">
    <title>Register</title>
</head>
<body>
    <?php
    require "conn.php";
    if (isset($_POST['btn'])) {
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $adresse = $_POST['adresse'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashedpass = sha1($password);
        $stm1 = $con->prepare("SELECT * FROM users WHERE Email=?");
        $stm1 ->execute(array($email));
        $exist = $stm1->rowCount();
        if ($exist == 0) {
            $stm = $con->prepare("INSERT INTO users(fullname, username, adresse, email, passwd, rdate) VALUES(?, ?, ?, ?, ?, now())");
            $stm ->execute(array($fullname, $username, $adresse, $email, $hashedpass));
            if ($stm) {
                // $loader =  "<img class='loader' src='load1.gif'>";
                $msg = "Your account has Been created";
                
                    
             }else {
                 $msg2 = "There is an error";
            }
        }else {
            $msg2 = "Email Already exist";
        }
        
    }
    
    
   
    
    ?>
    <span class="gohome"><a href="index.php"><img class="gohome" src="../electroshop/images/icons/left-arrow.png" alt="" srcset=""></a></span>
    <div class="for">
        <img class="logo" src="../electroshop/layouts/icons/logo.png" alt="" srcset="">
        <h1 class="reg">Register</h1>
        <form action="" method="post">
            <img class="key" src="../electroshop/layouts/icons/user.png" alt="" srcset="">
            <input class="in" type="text" name="fullname" placeholder="Enter your Full Name" autocomplete="off" required><br>
            <img class="key" src="../electroshop/layouts/icons/user.png" alt="" srcset="">
            <input class="in" type="text" name="username" placeholder="Enter your username" autocomplete="off" required><br>
            <img class="key" src="../electroshop/layouts/icons/email.png" alt="" srcset="">
            <input class="in" type="text" name="adresse" placeholder="Enter your adresse" autocomplete="off" required><br>
            <img class="key" src="../electroshop/layouts/icons/email.png" alt="" srcset="">
            <input class="in" type="email" name="email" placeholder="Enter your email" autocomplete="off" required><br>
            <img class="key" src="../electroshop/layouts/icons/password.png" alt="" srcset="">
            <input class="in" type="password" name="password" placeholder="Enter your password" autocomplete="off" required><br>
            <input class="btn" type="submit" name="btn" value="Register"><br>
        <span>Already registred Login <a href="login.php">Here</a> </span>
        </form>
        <?php
        if (isset($msg)) {
            echo "<script> window.location.replace('login.php?seccess=account created seccessfully'); </script>";
        }elseif (isset($msg2)) {
            echo "<p class='error2'>$msg2</p>";
        }

        ?>
    </div>
</body>
</html>