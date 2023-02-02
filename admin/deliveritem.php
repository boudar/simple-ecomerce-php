<?php
require 'conn.php';
if (isset($_GET['deliverid'])) {
    $delid = $_GET['deliverid'];
    $d = $con->prepare("DELETE FROM requests where req_id = ?");
    $d->execute(array($delid));
    header("Location: deliver.php");

}
?>