<?php include "header.php"; ?>

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Day to Day Transactions</a></li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> Transaction History</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Export</h3>
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'false'});"><img src='img/icons/json.png' width="24"/> JSON</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'false',ignoreColumn:'[2,3]'});"><img src='img/icons/json.png' width="24"/> JSON (ignoreColumn)</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'json',escape:'true'});"><img src='img/icons/json.png' width="24"/> JSON (with Escape)</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'xml',escape:'false'});"><img src='img/icons/xml.png' width="24"/> XML</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'sql'});"><img src='img/icons/sql.png' width="24"/> SQL</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='img/icons/csv.png' width="24"/> CSV</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'txt',escape:'false'});"><img src='img/icons/txt.png' width="24"/> TXT</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"/> XLS</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='img/icons/word.png' width="24"/> Word</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'powerpoint',escape:'false'});"><img src='img/icons/ppt.png' width="24"/> PowerPoint</a></li>
                                            <li class="divider"></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'png',escape:'false'});"><img src='img/icons/png.png' width="24"/> PNG</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='img/icons/pdf.png' width="24"/> PDF</a></li>
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-body">
                                    <table id="customers2" class="table datatable" >
                                        <thead>
                                            <tr>
                                                <th  style="padding-left:0px;padding-right:0px;">Sno</th>
                                                <th>Date</th>
                                                <th>Head</th>
                                                <th>Purpose</th>
                                                <th>Proceeding No</th>
                                                <th>Amount </th>
                                                <th>Cheque No</th>
                                                <th>From Account</th>
                                                <th>TO Account</th>
                                                <th>Status</th>
                                                <th>Approval</th>
                                            </tr>
                                        </thead>
                                        <tbody ng-app="payments" ng-controller="paymentsCtrl">
                                            <?Php
                                             $sql = mysql_query('select * from payment_history order By date desc');
											while($res = mysql_fetch_array($sql)){?>
                                            <tr>
												<td  style="max-width:15px;padding:0px;text-align:left;" ><?php echo $res['sno'];?></td>
                                                <td style="max-width:70px;padding:0px;text-align:left;"  ><?php echo $res['Date'];?></td>
                                                <td><?php echo $res['dep_name'];?></td>
                                                <td><?php echo $res['purpose'];?></td>
                                                <td><a target="_blank" href="down.php?mano=<?php echo$res['filename'] ?>"><?php echo $res['proceeding_no'];?></a></td>
                                                <td><?php echo $res['amount'];?></td>
                                                <td><?php echo $res['check_no'];?></td>
                                                <td><?php echo $res['from_account'];?></td>
                                                <td><?php echo $res['to_account'];?></td>
                                                <td>
													<label class="switch"  >
                                                    <input type="checkbox" <?Php if($res['status']==1)echo "checked"; else echo "";?> ng-click="change(<?php echo $res['status'];?>,<?php echo $res['sno'];?>)"/>
                                                    <span style="height:20px;width:40px;"></span>
													</label>
												</td>
												<td><?php if($res['approvalStatus']==0) echo "<p style='color:red;'>NEW</p>";?><?php if($res['approvalStatus']==2) echo "<p style='color:blue;'>".$res['approvalCode']."</p>";?><?php if($res['approvalStatus']==1) echo "<p style='color:orange;'>PENDING</p>";?></td>
                                            </tr>
										<?php }?>
                                        </tbody>
                                    </table>                                    
                                    
                                </div>
                            </div>
                            <!-- END DATATABLE EXPORT -->                            
                        </div>
                    </div>

                </div>         
                <!-- END PAGE CONTENT WRAPPER -->
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->    

    <script>
	var app = angular.module('payments', []);
	app.controller('paymentsCtrl', function($scope, $http) {
		$scope.change = function(cur,sno){
    $http.post(apiBase+"getpaymentstatus.php",{sno:sno,cur:cur})
    .then(function (response) { console.log(response.data);});
	}});
	</script>
      <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>                    
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="logout.php" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include "footer.php";?>





