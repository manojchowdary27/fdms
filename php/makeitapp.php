<?php
session_start();
if(!isset($_SESSION['username'])) die("You are not authorised to be here...!");
require ("config.php");
require "approvalcodeconstant.php";

$content_type = 'application/json';
$status_code = 401;
$result = '';
$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    @$sno = $request->sno;
@$sno = htmlspecialchars(mysql_real_escape_string($sno));
$i=mysql_fetch_array(mysql_query("SELECT value FROM constants WHERE sno=1 "))or die(mysql_error());
$last=$i['value'];
$last=$last+1;
$code = sprintf("%05d",$last);
$codegen = $apcons.$code;
$mk1=mysql_query("UPDATE  constants set value='".$last."' WHERE sno=1 ")or die("Sorry,Unable to serve at this time....!");
$mk2=mysql_query("UPDATE  payment_history set approvalCode='".$codegen."' WHERE sno='".$sno."' ")or die("Sorry,Unable to serve at this time....!");
$new=2;
	$ok=mysql_query("update payment_history set approvalStatus='".$new."' where sno='".$sno."' " );
	if($ok && $mk2){ $status_code = 200;
	$result = '{"stat":"'.$codegen.'"}';
	} 
	
header('Content-Type:'.$content_type);
header('HTTP/1.1 '.$status_code);
echo $result;
?>
