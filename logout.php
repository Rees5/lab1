<?php
session_unset();
    session_destroy();
    session_start();
    $_SESSION['err']="Logout Successful.";
    header("location:login.php");
 ?>
