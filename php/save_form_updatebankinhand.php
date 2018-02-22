<?php
require ("checklogin.php");


     @$date = htmlspecialchars(mysql_real_escape_string($_POST['date']));
     @$accountNo = htmlspecialchars(mysql_real_escape_string($_POST['accountNo']));
     @$opening = htmlspecialchars(mysql_real_escape_string($_POST['opening']));
     @$closing = htmlspecialchars(mysql_real_escape_string($_POST['closing']));
     @$expen = htmlspecialchars(mysql_real_escape_string($_POST['expen']));
     @$ip=$_SERVER['REMOTE_ADDR'];
     @$uptime = date("Y-M-d");
      @$manojfilename=basename($_FILES["file"]["name"]);
     if($date=="" || $accountNo=="" || $opening=="" ||  $closing=="" ||  $expen=="" ){ die("Please fill all the fields to complete the payment...!");}
     include_once "config.php";
     $sql=mysql_query("     
     INSERT INTO `finaldata`.`cashinhand` (
`sno` ,
`accountNo` ,
`date` ,
`opening` ,
`closing` ,
`expenditure` ,
`ip` ,
`uptime`
)
VALUES (
NULL , '$accountNo', '$date', '$opening', '$closing', '$expen', '$ip', '$uptime'
)") or die(mysql_error());
     if ($sql === TRUE ) {
		 $res= array('saved'=>'yes');
         echo json_encode($res); // Successfully updated the account Summary tables
     } else {
        echo "Error";
     }
     
     //NULL ,  '$date',  '$accountNo',  '$opening',  '$closing',  '$expen', '$ip',  '$uptime',
     
     
     
     
?>
