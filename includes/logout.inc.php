<?php 
    // todo delete userItems
    session_start();
    unset($_SESSION['PHPSESSID']);
    $_SESSION = array();
    setcookie ("PHPSESSID", "", time() - 3600);
    session_unset();
    session_destroy();
    header("Location: ../index.php");  
 ?>
