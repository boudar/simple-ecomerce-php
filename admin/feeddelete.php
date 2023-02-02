<?php
require "conn.php";
if (isset($_GET['feedid'])) {
    $feed = $_GET['feedid'];
    $d = $con->prepare("DELETE FROM feedbacks WHERE feed_id=?");
    $d->execute(array($feed));
    echo "<script>window.location.replace('feedbacks.php');</script>";
}

?>