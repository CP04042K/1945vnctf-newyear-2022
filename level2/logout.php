<?php 
session_start();

session_destroy();
session_unset();
setcookie("auth", "", time()-3600);
header("Location: /login.php");
?>