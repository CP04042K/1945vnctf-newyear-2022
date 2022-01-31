<?php
require_once("session.php");
session_start();

if (!isset($_SESSION["auth"]) || !isset($_COOKIE["auth"])) {
	header("Location: /login.php");
	die();
}

else if ($_SESSION["auth"] !== $_COOKIE["auth"]) {
	header("Location: /login.php");
	die();
}

?>