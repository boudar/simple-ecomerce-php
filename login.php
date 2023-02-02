<?php
if (isset($_COOKIE['loggedin'])) {
    if ($_COOKIE['loggedin'] !== true) {
        echo "<script> window.location.replace('index.php'); </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../electroshop/layouts/css/style.css">
    <link rel="icon" type="image/x-icon" href="layouts/icons/shopping-cart.png">

    <title>login</title>
</head>
<body>
    <?php
    session_start();
    require "conn.php";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $hashedpassword = sha1($password);
        //check if the user exist
        $stmt = $con->prepare("SELECT email,passwd,id,usertype,username FROM users WHERE email = ? AND passwd = ?");
        $stmt->execute(array($email,$hashedpassword)); //execute and search if the records exist
        $c = $stmt->rowCount(); // this will return eather 1 or 0 
        $result = $stmt->fetch();
        if ($c > 0) {
            if ($result['usertype'] == 1) {
                $_SESSION['email'] = $email;
                $_SESSION['id'] = $result['id'];
                // header("Location: admin/dash.php?status=seccess");
                echo "<script> window.location.replace('admin/dash.php?status=seccess'); </script>";

            }elseif($result['usertype'] == 0) {
                $_SESSION['usemail'] = $email;
                $_SESSION['uid'] = $result['id'];
                $_SESSION['username'] = $result['username'];
                setcookie("loggedin", true);
                // header("Location: index.php");
                echo "<script> window.location.replace('index.php'); </script>";


                
    
            }
            }else{
                $error = '<p class="error2">Wrong Username Or password please try again</p>';
            }
        }
 
    ?>
    <span class="gohome"><a href="index.php"><img class="gohome" src="../electroshop/images/icons/left-arrow.png" alt="" srcset=""></a></span>

    <div class="for2">
        <!-- <h1 class="log">Login</h1> -->
        <img class="logo" src="../electroshop/layouts/icons/logo.png" alt="" srcset="">
        <h1 class="log">Login</h1>
        <form action="" method="post" onsubmit="return on()">
            <img class="key" src="../electroshop/layouts/icons/email.png" alt="" srcset="">
            <span id='empt'></span>
            <input class="in" id="em" type="email" name="email" placeholder="Enter your email" autocomplete="off"><br>
            <img class="key" src="../electroshop/layouts/icons/password.png" alt="" srcset="">
            <input class="in" type="password" name="password" placeholder="Enter your password" autocomplete="off"><br>
            <input class="btn" type="submit" id="log"  name="btn" value="Login"><br>
        <span id="spn">You don't have an account register <a href="register.php">Here</a> </span>
        </form>
        <?php
        if (isset($error)) {
            echo $error;
        }
        if (isset($_GET['seccess'])) {
            $sec = $_GET['seccess'];
             echo "<p class='error'>$sec</p>";
         }


         if (isset($_GET['loggedout'])) {
            $sec2 = $_GET['loggedout'];
             echo "<p class='loggedout'>$sec2</p>";
         }
        ?>
     </div>
     
</body>
</html>

