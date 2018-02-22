<?php
require ("checklogin.php");
     @$name = htmlspecialchars(mysql_real_escape_string($_POST['headName']));
     @$type = htmlspecialchars(mysql_real_escape_string($_POST['headType']));
     if($name=="" || $type=="" ){ die("Please fill all the fields to complete the payment...!");}
     include_once "config.php"; 
     if($type==1)
     $sql=mysql_query(" 
INSERT INTO `finaldata`.`f_dep` (
`sno` ,
`dep_name` ,
`amount` ,
`hits`
)
VALUES (
NULL , '$name', '0', '0'
) ") or die(mysql_error());
     else if ($type==2)
		 $sql=mysql_query(" 
INSERT INTO `finaldata`.`incomedep` (
`sno` ,
`dep_name` ,
`amount` ,
`hits`
)
VALUES (
NULL , '$name', '0', '0'
) ") or die(mysql_error());
else{
	die("Please select Type..");
	}
     if ($sql === TRUE ) {
		 $res= array('saved'=>'yes');
         echo json_encode($res); // Successfully updated  table
     } else {
        echo "Error";
     }
?>
