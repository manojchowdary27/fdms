<?php require "checklogin.php";?>
<?php require "config.php";
$sql1 = mysql_fetch_array(mysql_query('select count(*) as cou from payment_history where approvalStatus=0'));
$sql2 = mysql_fetch_array(mysql_query('select count(*) as cou from payment_history where approvalStatus=1'));
?>
<!DOCTYPE html>
<html lang="en">
    <head>        
        <!-- META SECTION -->
        <title>FDMS-RGUKTN</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-blue.css"/>
        <script src="js/angular.min.js"></script>
        <script>
        var apiBase = "http://10.4.43.227/php/";
        </script>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body >
     
        <!-- START PAGE CONTAINER -->
        <div class="page-container page-navigation-top"  >    
            <!-- PAGE CONTENT -->
            <div class="page-content" style="padding:0px;background-image:url('img/back.png')">
                
                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal"  >
                    <li class="xn-logo" >
                        <a href="index.php" style="width:400px;"><img src="img/rgu.png" height="40px" width="40px" ><strong>FDMS-RGUKTN</strong><sub style="color:#B872DD;">2016-2017</sub></a>
                        <a href="#" class="x-navigation-control"></a>
                    </li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">PayMents<span class="fa fa-caret-down"></span></span></a>
                        <ul class="animated zoomIn">
                            <li><a href="daytoday.php"><span class="fa fa-image"></span>DAY TO DAY Transactions</a></li>
                            <?php if($_SESSION['username']=='shyam'){ ?><li><a href="addnew.php"><span class="fa fa-user"></span> Add New Payment</a></li><?php }?>
                        </ul>
                    </li>
                    
                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Receipts<span class="fa fa-caret-down"></span></span></a>
                        <ul class="animated zoomIn">
                            <li><a href="bankAccount.php"><span class="fa fa-image"></span>Bank Accounts</a></li>
                            <li><a href="bankAccountinhand.php"><span class="fa fa-image"></span>Cash In Hand</a></li>
                            <li><a href="indirectIncome.php"><span class="fa fa-image"></span>Indirect Income</a></li>
                            <?php if($_SESSION['username']=='shyam'){ ?><li><a href="addNewreceipt.php"><span class="fa fa-user"></span> Add New Receipt</a></li><?php }?>
                        </ul>
                    </li>
                    
                    
                    
                    <?php  if($_SESSION['username']=='shyam') {?>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Status <?php if($sql2['cou']>=1){?><span class="badge" style="background-color:orange;">&nbsp;<?php echo $sql2['cou']; }?></span><?php if($sql1['cou']>=1){?><span class="badge" style="background-color:blue;">&nbsp;<?php echo $sql1['cou'];}?></span><span class="fa fa-caret-down"></span></span></a>
                        <ul class="animated zoomIn">
                            <li><a href="newpayments.php"><span class="fa fa-image"></span>NEW<?php if($sql1['cou']>=1){?>&nbsp;<span class="badge" style="background-color:blue;"><?php echo $sql1['cou'];}?></span></a></li>
                            <li><a href="pendingpayments.php"><span class="fa fa-user"></span>PENDING<?php if($sql2['cou']>=1){?>&nbsp;<span class="badge" style="background-color:orange;">&nbsp;<?php echo $sql2['cou']; }?></span></a></li>
                        </ul>
                    </li>
                    <?php }  ?>
                    
                    
                    
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Export<span class="fa fa-caret-down"></span></span></a>
                      <ul class="animated zoomIn">
                            <li><a href="exporter.php"><span class="fa fa-image"></span>Dynamic Exporter</a></li>
                            <li><a href="annualreport.php"><span class="fa fa-files-o"></span>Annual Report-Debit</a></li>
                            <li><a href="annualreportcredit.php"><span class="fa fa-files-o"></span>Annual Report-Credit</a></li>
                        </ul>
                      
                      
                      </li>
                    <li class="xn-openable pull-right">
                        <a href="#"><strong>Welcome: </strong><?php echo $_SESSION['username']; ?><span class="fa fa-caret-down"></span></a>
                         <ul class="animated zoomIn">
							<li class="xn-openable pull-right"><a href="#" class="mb-control" data-box="#mb-signout"><span class="xn-text"><strong>LogOut</strong> </span><span class="fa fa-sign-out"></span></a></li> 
                       <?php if($_SESSION['username']=='shyam'){ ?>
                        
							  <li><a href="logintrace.php"><span class="fa fa-files-o"></span>Trace Logins</a></li>
							  <li><a href="addnewhead.php"><span class="fa fa-files-o"></span>Add New Head</a></li>
							  <li><a href="updateBankAccount.php"><span class="fa fa-files-o"></span>Update Bank Accounts</a></li>
							  <li><a href="updateBankAccountinhand.php"><span class="fa fa-files-o"></span>Update Cash In Hand </a></li>
                        
                        <?php } ?>
                        </ul>
                    </li>
                    
               <!-- SIGN OUT -->
                    <!----li><span class=" xn-text ">                           
                               <span class="fa fa-calendar"></span> <span class=" plugin-date">Loading...</span><span class=" animated zoomInfa fa-clock-o"></span><span class="small-int plugin-clock">00:00</span>                                                         
                            </span>
                       </li--->
                   
                    <!-- END SIGN OUT -->                                        
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->                     
        
                <div class="modal" id="modal_small" tabindex="-1" role="dialog" aria-labelledby="smallModalHead" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                        <h4 class="modal-title" id="smallModalHead">Small Modal</h4>
                    </div>
                    <div class="modal-body">
                        Some content in modal example
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>                        
                    </div>
                </div>
            </div>
        </div>
        
				
