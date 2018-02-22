<?php include "header.php"; ?>

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">IndirectIncome</a></li>
                </ul>
                <!-- END BREADCRUMB -->
                
                <!-- PAGE TITLE -->
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span> IndirectIncome</h2>
                </div>
                <!-- END PAGE TITLE -->                
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <div class="btn-group pull-right">
                                        <button class="btn btn-danger dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i> Export Data</button>
                                        <ul class="dropdown-menu">
											<li><a href="#" onClick ="$('#customers2').tableExport({type:'pdf',escape:'false'});"><img src='img/icons/pdf.png' width="24"/> PDF</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'png',escape:'false'});"><img src='img/icons/png.png' width="24"/> PNG</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'excel',escape:'false'});"><img src='img/icons/xls.png' width="24"/> XLS</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'csv',escape:'false'});"><img src='img/icons/csv.png' width="24"/> CSV</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'sql'});"><img src='img/icons/sql.png' width="24"/> SQL</a></li>
                                            <li><a href="#" onClick ="$('#customers2').tableExport({type:'doc',escape:'false'});"><img src='img/icons/word.png' width="24"/> Word</a></li>
                                        </ul>
                                    </div>                                    
                                    
                                </div>
                                <div class="panel-body">
                                    <table id="customers2" class="table datatable" >
                                        <thead>
                                            <tr>
                                                <th  style="padding-left:0px;padding-right:0px;">Sno</th>
                                                <th>Date</th>
                                                <th>Source</th>
                                                <th>Amount</th>
                                                <th>From A/c</th>
                                                <th>To A/c</th>
                                                <th>Details</th>
                                        
                                            </tr>
                                        </thead>
                                        <tbody >
                                            <?Php
                                             $sql = mysql_query('select * from income_history order By date desc');
											while($res = mysql_fetch_array($sql)){?>
                                            <tr>
												<td  style="max-width:15px;padding:0px;text-align:left;" ><?php echo $res['sno'];?></td>
                                                <td style="max-width:70px;padding:0px;text-align:left;"  ><?php echo $res['date'];?></td>
                                                <td><?php echo $res['source'];?></td>
                                                <td><?php echo $res['amount'];?></td>
                                                <td><?php echo $res['from'];?></td>
                                                <td><?php echo $res['to'];?></td>
                                                <td><?php echo $res['details'];?></td>
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
		$scope.change = function(cur,sno){$http.post(apiBase+"getpaymentstatus.php",{sno:sno,cur:cur}).then(function (response) { console.log(response.data);});}
		$scope.makeitpend = function(sno){document.getElementById("man"+sno).innerHTML="<img src='img/loadingmanoj.gif' height=30px width:20px/>";  $http.post(apiBase+"makeitpend.php",{sno:sno}).then(function (response) { console.log(response.data.stat);document.getElementById("man"+sno).innerHTML="<p style='color:Orange'>"+response.data.stat+"</p>";});}	
		$scope.makeitapp = function(sno){document.getElementById("man"+sno).innerHTML="<img src='img/loadingmanoj.gif' height=30px width:20px/>";   $http.post(apiBase+"makeitapp.php",{sno:sno}).then(function (response) { console.log(response.data.stat);document.getElementById("man"+sno).innerHTML="<p style='color:Blue'>"+response.data.stat+"</p>";});}	
	});
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
        <!-- END MESSAGE BOX-->
        <?php include "footer.php"; ?>
