<?php
session_start();
require "conn.php";
if (isset($_GET['id'])) {
    $uid = $_GET['id'];
    if ($uid == $_SESSION['uid']) {
        //get data from db

        $get = $con->prepare("SELECT username,email from users where id=?");
        $get->execute(array($uid));
        $rget = $get->fetch();
        $u = $rget['username'];
        $e = $rget['email'];
        //insert into backup

        $inset = $con->prepare("INSERT INTO backup(username,email) values(?,?)");
        $inset->execute(array($u,$e));

        //then delete the account from users
        $d = $con->prepare("DELETE FROM users where id=?");
        $d->execute(array($uid));
        session_unset();
        session_destroy();
        setcookie("loggedin","");
        header("Location: index.php");
    }else {
       echo "forbidden";
    } 
    
}


?>