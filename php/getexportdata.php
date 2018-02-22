<?php
require ("checklogin.php");
require ("config.php"); 


$content_type = 'application/text';
$status_code = 200;
$result = '';
   
    $postdata = file_get_contents("php://input");
    $request = json_decode($postdata);
	$dep =  htmlspecialchars(mysql_real_escape_string($request->dep));
	$date1 = htmlspecialchars(mysql_real_escape_string($request->date1));
	$date2 = htmlspecialchars(mysql_real_escape_string($request->date2));
    $date = htmlspecialchars(mysql_real_escape_string($request->date));
    $head = htmlspecialchars(mysql_real_escape_string($request->head));
    $proceeding = htmlspecialchars(mysql_real_escape_string($request->proceeding));
    $amount = htmlspecialchars(mysql_real_escape_string($request->amount));
    $account = htmlspecialchars(mysql_real_escape_string($request->account));
    $purpose = 	htmlspecialchars(mysql_real_escape_string($request->purpose));	
    $check_no = 	htmlspecialchars(mysql_real_escape_string($request->check_no));
    
    	
    $to_account = htmlspecialchars(mysql_real_escape_string($request->to_account));	
    $payeename  = htmlspecialchars(mysql_real_escape_string($request->payeename));	
    $type       = htmlspecialchars(mysql_real_escape_string($request->type));	
    $sectiondep = htmlspecialchars(mysql_real_escape_string($request->sectiondep));	
    $designation=htmlspecialchars(mysql_real_escape_string($request->designation));	
    $approvalCode=htmlspecialchars(mysql_real_escape_string($request->approvalCode));	
     
    $result="";
    
    $sql = mysql_query("SELECT * from payment_history where Date >='".$date1."' and  Date <='".$date2."' and dep_name='".$dep."' ") or die(mysql_error());
	while($res = mysql_fetch_array($sql)){
		if($result!=""){$result .=",";}
		$result.='{';
		
		
		
		
		
		
		if($approvalCode==true) {$result.='"ApprovalCode":' . '"' .$res["approvalCode"].'"'; if( $designation==true || $sectiondep==true || $payeename==true || $to_account==true || $check_no==true|| $purpose==true || $date==true || $head==true || $proceeding==true || $amount==true || $account==true) $result.=','; }
		if($designation==true) {$result.='"Designation":' . '"' .$res["designation"].'"'; if( $sectiondep==true || $payeename==true || $to_account==true || $check_no==true|| $purpose==true || $date==true || $head==true || $proceeding==true || $amount==true || $account==true) $result.=','; }
		if($sectiondep==true) {$result.='"Section":' . '"' .$res["sectiondep"].'"'; if($type==true || $payeename==true || $to_account==true || $check_no==true|| $purpose==true || $date==true || $head==true || $proceeding==true || $amount==true || $account==true) $result.=','; }
		if($type==true) {$result.='"Type":' . '"' .$res["type"].'"'; if( $payeename==true || $to_account==true || $check_no==true|| $purpose==true || $date==true || $head==true || $proceeding==true || $amount==true || $account==true) $result.=','; }
		if($payeename==true) {$result.='"Name":' . '"' .$res["payeename"].'"'; if( $to_account==true || $check_no==true|| $purpose==true || $date==true || $head==true || $proceeding==true || $amount==true || $account==true) $result.=','; }
		if($to_account==true) {$result.='"To A/c":' . '"' .$res["to_account"].'"'; if( $check_no==true|| $purpose==true || $date==true || $head==true || $proceeding==true || $amount==true || $account==true) $result.=','; }
		
		
		if($check_no==true) {$result.='"Cheque No":' . '"' .$res["check_no"].'"'; if($purpose==true || $date==true || $head==true || $proceeding==true || $amount==true || $account==true) $result.=','; }
		if($purpose==true) {$result.='"Purpose":' . '"' .$res["purpose"].'"'; if($date==true || $head==true || $proceeding==true || $amount==true || $account==true) $result.=','; }
		if($date==true) {$result.='"Date":' . '"' .$res["Date"].'"'; if($head==true || $proceeding==true || $amount==true || $account==true) $result.=','; }
		if($head==true) {$result.='"Head":' . '"' .$res["dep_name"].'"'; if($proceeding==true || $amount==true || $account==true) $result.=','; }
		if($proceeding==true) 	{	$result.='"Proceeding No":' . '"' .$res["proceeding_no"].'"'; if($amount==true || $account==true) $result.=',';}
		if($amount==true) {$result.='"Amount":' . '"' .$res["amount"].'"'; if($account==true) $result.=',';}
		if($account==true) {$result.='"From A/c":' . '"' .$res["from_account"].'"';} 
		$result.='}';
		}
		$result = '{ "records":[' .$result.']}';
     if ($sql == TRUE ){
		header('Content-Type:'.$content_type);
		header('HTTP/1.1 '.$status_code);
		echo $result;
     } else {
        echo "Error";
     }
?>
