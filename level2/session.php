<?php 
$timeToLive = 86400 * 30;
ini_set('session.gc_maxlifetime', $timeToLive);

session_start();

if (isset($_SESSION["auth"]) && (time() > $_SESSION['expire'])) {
    session_unset();     
    session_destroy();
}

?>