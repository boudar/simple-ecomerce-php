<?php
$dn = 'mysql:host=localhost;dbname=ecophp';
$user = 'root';
$pass = '';
$options = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', // set options to  allow insert differents langs 
);


try {
    $con = new PDO($dn, $user, $pass, $options); // try to connect to database
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // https://www.php.net/manual/en/pdo.setattribute.php
    // echo 'You Are Connected to the database';
}


catch (PDOException $e){ //catch the error usong pdoexception
    echo 'Faild to connect'.$e->getMessage();  //get the massage error from PDOException
}

?>