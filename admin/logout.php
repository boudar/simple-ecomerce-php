<?php

session_start(); //start the session

session_unset();

session_destroy(); //remove the session

header("Location: /electroshop/login.php");

exit();

?>