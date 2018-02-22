<?php
require ("checklogin.php");

     $target_dir = "./upload/";
     @$date = htmlspecialchars(mysql_real_escape_string($_POST['date']));
     @$head = htmlspecialchars(mysql_real_escape_string($_POST['head']));
     @$purpose = htmlspecialchars(mysql_real_escape_string($_POST['purpose']));
     @$proceeding_no = htmlspecialchars(mysql_real_escape_string($_POST['proceeding_no']));
     @$amount = htmlspecialchars(mysql_real_escape_string($_POST['amount']));
     @$cheque = htmlspecialchars(mysql_real_escape_string($_POST['cheque']));
     @$status = htmlspecialchars(mysql_real_escape_string($_POST['status']));
     $status=1; 
     @$from = htmlspecialchars(mysql_real_escape_string($_POST['from']));
     @$to = htmlspecialchars(mysql_real_escape_string($_POST['to']));
     
     
     @$sectiondep = htmlspecialchars(mysql_real_escape_string($_POST['sectiondep']));
     @$designation = htmlspecialchars(mysql_real_escape_string($_POST['designation']));
     @$type = htmlspecialchars(mysql_real_escape_string($_POST['type']));
     @$payeename = htmlspecialchars(mysql_real_escape_string($_POST['payeename']));
     
     @$ip=$_SERVER['REMOTE_ADDR'];
     @$uptime = date("Y-M-d");
     if($date=="" || $head=="" || $purpose=="" || $proceeding_no=="" || $amount=="" || $cheque== "" || $from=="" || $to=="" || $payeename=="" || $type== "" || $sectiondep=="" || $designation==""){ die("Please fill all the fields to complete the payment...!");}
     @$manojfilename=basename($_FILES["file"]["name"]);
    
     $ext = pathinfo($manojfilename, PATHINFO_EXTENSION);
     $ext2 = strtoupper($ext);
     if($ext2=="JPG" || $ext2=="PNG" || $ext2=="PDF" ){} //do nothing continue for uploading
     else die("File Format Not Supported..! Please Upload JPG/PNG/PDF file");
     $manojfilename = $date.$head.$purpose.$cheque.$status.$ip."manojchowdary27".$manojfilename."pathipati";
     $manojfilename = md5($manojfilename);
     $manojfilename = md5($manojfilename).".".$ext;
     $target_file = $target_dir . $manojfilename;

     move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

     //code to save the details in data base 
     include_once "config.php";
     $sql = mysql_query("INSERT INTO payment_history (sno,Date,dep_name,purpose,proceeding_no,amount,check_no,from_account,to_account,status,ip,lastupdatedtime,filename,payeename,type,sectiondep,designation) VALUES ('','".$date."','".$head."','".$purpose."','".$proceeding_no."','".$amount."','".$cheque."','".$from."','".$to."','".$status."','".$ip."','".$uptime."','".$manojfilename."','".$payeename."','".$type."','".$sectiondep."','".$designation."') ") or die(mysql_error());
		
		$sql2= mysql_fetch_array(mysql_query("select amount from f_dep where dep_name='".$head."' ")) or die(mysql_error());
		$totalamount = $sql2['amount']+$amount;
		$sql3 = mysql_query("update f_dep set amount='".$totalamount."' where dep_name = '".$head."' ") or die(mysql_error());
     if ($sql === TRUE && $sql3 == TRUE) {
		 $res= array('saved'=>'yes');
         echo json_encode($res); // Successfully updated the two tables
     } else {
        echo "Error";
     }

     
?>
