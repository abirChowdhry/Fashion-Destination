<?php
session_start();
unset($_SESSION['IS_LOGIN']);
header('location:../Views/Login.php');
die();
?>