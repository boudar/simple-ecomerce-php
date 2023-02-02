<?php
require "conn.php";

if (isset($_GET['userid'])) {
    $id = $_GET['userid'];
    $data = $con->prepare("DELETE FROM users where id=?");
    $data->execute(array($id));
    header("Location: dash.php#deleted");
}
?>