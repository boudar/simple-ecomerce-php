<?php
require 'conn.php';
if (isset($_GET['productid'])) {
    $pid = $_GET['productid'];
    $d = $con->prepare("DELETE FROM items where item_id = ?");
    $d->execute(array($pid));
    header("Location: pmanager.php#deleted");

}
?>