<?php
require "conn.php";

if (isset($_GET['userid'])) {
    $id = $_GET['userid'];
    $data = $con->prepare("UPDATE users set usertype=1 where id=?");
    $data->execute(array($id));
    header("Location: dash.php");
}

?>