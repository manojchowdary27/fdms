<?php

session_start();
if(!isset($_SESSION['username'])) {header('Content-Type:application/json');
header('HTTP/1.1 401');die("Unauthorised");}
$content_type = 'application/json';
$status_code = 401;
$result = '';
$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    @$sno = $request->sno;
@$sno = htmlspecialchars(mysql_real_escape_string($sno));
require ("config.php");
	$sql = mysql_fetch_array(mysql_query("select hits from f_dep where sno='".$sno."' "));
	$inc=$sql['hits']+1;
	$ok=mysql_query("update f_dep set hits='".$inc."' where sno='".$sno."' " );
	if($ok){ $status_code = 200;
	$result = "incremented";
	} 
	
header('Content-Type:'.$content_type);
header('HTTP/1.1 '.$status_code);
echo json_encode($ok);
?>
