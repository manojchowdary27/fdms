<?php
session_start();
if(!isset($_SESSION['username'])) die("You are not authorised to be here...!");
$content_type = 'application/json';
$status_code = 200;
$result = '';
require ("config.php");
	$sql = mysql_query('select * from accounts');
	while($res = mysql_fetch_array($sql)){
		if($result!=""){$result .=",";}
		$result.='{"sno":' . '"' .$res["sno"].'",'; 
		$result.='"accountNo":' . '"' .$res["accountNo"].'"}'; 
		}
		$result = '{ "records":[' .$result.']}';
header('Content-Type:'.$content_type);
header('HTTP/1.1 '.$status_code);
echo $result;
?>
