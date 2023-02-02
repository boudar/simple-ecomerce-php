<?php
setcookie("loggedin","");

session_start(); //start the session

session_unset();

session_destroy(); //remove the session


header("Location: /electroshop/index.php");

exit();


?>