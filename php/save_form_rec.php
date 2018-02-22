<?php
require ("checklogin.php");

     $target_dir = "./upload/receipts/";
     @$date = htmlspecialchars(mysql_real_escape_string($_POST['date']));
     @$head = htmlspecialchars(mysql_real_escape_string($_POST['head']));
     @$purpose = htmlspecialchars(mysql_real_escape_string($_POST['purpose']));
    // @$proceeding_no = htmlspecialchars(mysql_real_escape_string($_POST['proceeding_no']));
     @$amount = htmlspecialchars(mysql_real_escape_string($_POST['amount']));
    // @$cheque = htmlspecialchars(mysql_real_escape_string($_POST['cheque']));
    // @$status = htmlspecialchars(mysql_real_escape_string($_POST['status']));
     //$status=1; 
     @$from = htmlspecialchars(mysql_real_escape_string($_POST['from']));
     @$to = htmlspecialchars(mysql_real_escape_string($_POST['to']));
     
     
     //@$sectiondep = htmlspecialchars(mysql_real_escape_string($_POST['sectiondep']));
     //@$designation = htmlspecialchars(mysql_real_escape_string($_POST['designation']));
     //@$type = htmlspecialchars(mysql_real_escape_string($_POST['type']));
     @$payeename = htmlspecialchars(mysql_real_escape_string($_POST['payeename']));
     
     @$ip=$_SERVER['REMOTE_ADDR'];
     @$uptime = date("Y-M-d");
      @$manojfilename=basename($_FILES["file"]["name"]);
     if($date=="" || $head=="" || $purpose=="" ||  $amount=="" ||  $from=="" || $to=="" || $payeename==""  || $manojfilename==""){ die("Please fill all the fields to complete the payment...!");}
    
    
     $ext = pathinfo($manojfilename, PATHINFO_EXTENSION);
     $ext2 = strtoupper($ext);
     if($ext2=="JPG" || $ext2=="PNG" || $ext2=="PDF" ){} //do nothing continue for uploading
     else die("File Format Not Supported..! Please Upload JPG/PNG/PDF file");
     $manojfilename = $date.$head.$purpose.$ip."manojchowdary27".$manojfilename."pathipati";
     $manojfilename = md5($manojfilename);
     $manojfilename = md5($manojfilename).".".$ext;
     $target_file = $target_dir . $manojfilename;

     move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);
     //code to save the details in data base 
     include_once "config.php";
     //
     
     
     $sql=mysql_query("INSERT INTO  `finaldata`.`income_history` (
				`sno` ,
				`date` ,
				`source` ,
				`amount` ,
				`from` ,
				`to` ,
				`details` ,
				`ip` ,
				`lastupdatedtime` ,
				`filename` ,
				`payeename`
				)
				VALUES (
				NULL ,  '$date',  '$head',  '$amount',  '$from',  '$to',  '$purpose',  '$ip',  '$uptime',  '$manojfilename',  '$payeename'
				)");
     
     //$sql = mysql_query("INSERT INTO income_history (sno,date,source,amount,from,to,details,ip,lastupdatedtime,filename,payeename)
      //VALUES ( '','$date', '$head','$amount','$from','$to','$purpose','$ip','$uptime','$manojfilename','$payeename') ") or die(mysql_error());
		$sql2= mysql_fetch_array(mysql_query("select amount from incomedep where dep_name='".$head."' ")) or die(mysql_error());
		$totalamount = $sql2['amount']+$amount;
		$sql3 = mysql_query("update incomedep set amount='".$totalamount."' where dep_name = '".$head."' ") or die(mysql_error());
     if ($sql === TRUE && $sql3 == TRUE) {
		 $res= array('saved'=>'yes');
         echo json_encode($res); // Successfully updated the two tables
     } else {
        echo "Error";
     }
     
     
     
     
     
     
?>
