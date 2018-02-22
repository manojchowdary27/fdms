<?php session_start();
include "config.php";
$update = mysql_query("Update loginrequests set outime='".$serverdate."' where intime='".$_SESSION['serverdate']."' ") or die("Error occured while storing outtime");
session_destroy();
header('location:login.php');?>
