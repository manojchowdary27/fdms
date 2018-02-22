<?php
session_start();
if(!isset($_SESSION['username'])) die("You are not authorised to be here...!");
$content_type = 'application/json';
$status_code = 401;
$result = '';
$postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
    @$sno = $request->sno;
    @$cur = $request->cur;
@$sno = htmlspecialchars(mysql_real_escape_string($sno));
@$cur = htmlspecialchars(mysql_real_escape_string($cur));
require ("config.php");
	$sql = mysql_fetch_array(mysql_query("select status from payment_history where sno='".$sno."' "));
	if($sql['status']==0) $new=1;
	else $new=0;
	$ok=mysql_query("update payment_history set status='".$new."' where sno='".$sno."' " );
	if($ok){ $status_code = 200;
	$result = "changed";
	} 
	
header('Content-Type:'.$content_type);
header('HTTP/1.1 '.$status_code);
echo json_encode($ok);
?>
