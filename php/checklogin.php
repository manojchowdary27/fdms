<?php session_start();
if(!isset($_SESSION['username'])) header('location:http://localhost/2017/joli/joli-admin-master/joli/login.php');
?>
