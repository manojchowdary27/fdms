<?php
session_start();
require ("../config.php");
@$postdata = file_get_contents("php://input");
@$request = json_decode($postdata);
@$user = $request->user;
@$pwd = $request->pwd;
@$user=mysql_real_escape_string(htmlspecialchars($user));
@$pwd=md5(mysql_real_escape_string(htmlspecialchars($pwd)));
$ip = $_SERVER['REMOTE_ADDR'];
$result=mysql_fetch_array(mysql_query("select count(*) as value from f_users where f_id='".$user."' and f_pwd='".$pwd."' ")) or die("Error occured while details cheking in");
if($result['value']>=1) {
	
	 $_SESSION['username']=$user; 
	 $_SESSION['serverdate']=$serverdate;
	$res= array('access'=>'allow');
	$statusman="Success";
	$addlogin = mysql_query("INSERT INTO loginrequests (sno,username,status,intime,ip) VALUES ('','".$user."','".$statusman."','".$serverdate."','".$ip."') ") or die("Error occured while storing the log request");
	header('Content-Type:application/text');
header('HTTP/1.1 200 ');
echo json_encode($res);
	}
else {
	
	header('Content-Type:application/text');
	$statusman="Failed";
	$res= array('access'=>'notallow');
	$addlogin = mysql_query("INSERT INTO loginrequests (sno,username,status,intime,ip) VALUES ('','".$user."','".$statusman."','".$serverdate."','".$ip."') ") or die("Error occured while storing the log request");
	header('HTTP/1.1 200 ');
	echo json_encode($res);


}

?>
