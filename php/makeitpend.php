<?php
session_start();
if(!isset($_SESSION['username'])) die("You are not authorised to be here...!");
$content_type = 'application/json';
$status_code = 401;
$result = '';
$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    @$sno = $request->sno;
@$sno = htmlspecialchars(mysql_real_escape_string($sno));
require ("config.php");
$new=1;
	$ok=mysql_query("update payment_history set approvalStatus='".$new."' where sno='".$sno."' " );
	if($ok){ $status_code = 200;
	$result = '{"stat":"pending"}';
	} 
	
header('Content-Type:'.$content_type);
header('HTTP/1.1 '.$status_code);
echo $result;
?>
