<?php include "header.php";?>  
<script src="js/app.js"></script>           
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>                    
                    <li class="active">Export</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Dynamic Exporter</h2>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Please Fill  The Fields </h3>
                                </div>
                                <div class="panel-body">
                                  
                                 <!---Form Starts Here ---> 
                              <div class="block">                        
                                <form name="payform" class="form-horizontal" role="form" ng-app="exportApp" ng-controller="exportCtrl">                                    
                                                                      <!--  date starts-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Date</label>
                                        <div class="col-md-3">
                                            <input type="text" name="date1" class="form-control datepicker plugin-date" ng-model="date1" id="date1"><span ng-show="payform.date.$touched && payform.date1.$invalid">*Required Field</span>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">To Date</label>
                                        <div class="col-md-3">
                                            <input type="text" name="date2" class="form-control datepicker plugin-date" ng-model="date2" id="date2"><span ng-show="payform.date.$touched && payform.date2.$invalid">*Required Field</span>
                                        </div>
                                    </div>
                                    
                                    <!-- date ends-->
                                    <!--Head/Department Search starts--->
                                    <div class="form-group" >
                                        <label class="col-md-4 control-label">Head/Category</label>
                                        <div class="col-md-3">                                                                                
                                            <select class="form-control select" data-live-search="true" ng-model="head" id="dep">
												 <option value="all">ALL</option>
												 <?Php
                                             $sql = mysql_query('select dep_name from f_dep order By hits desc');
											while($res = mysql_fetch_array($sql)){
												echo "<option value=".'"'.$res['dep_name'].'"'.">".$res['dep_name']."</option>";
												 } ?>
                                            </select>
                                            
                                        </div>
                                    </div> 
                                    <!--Head/Department Search ends--->
                                    
                                    
                                <!---------Cooulmns to be exported starts here---->
                                
									 <div class="form-group">
										 <h4>Please check the boxes to be exported</h4>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="checkbox" class="icheckbox" id='date' />Date</label>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="checkbox" class="icheckbox" id='head'/>Head</label>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="checkbox" class="icheckbox" id='proceeding'/>Proceeding No</label>
                                        </div>
                                         <div class="col-md-4">                                    
                                            <label class="check"><input type="checkbox" class="icheckbox"id='amount'/>Amount</label>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="checkbox" class="icheckbox" id='account'/>From A/c</label>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="checkbox" class="icheckbox" id='purpose'/>Purpose</label>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="checkbox" class="icheckbox" id='check_no'/>Cheque No</label>
                                        </div>
                                        
                                        
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="checkbox" class="icheckbox" id='to_account'/>To A/c</label>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="checkbox" class="icheckbox" id='payeename'/>Payee Name</label>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="checkbox" class="icheckbox" id='type'/>Type</label>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="checkbox" class="icheckbox" id='sectiondep'/>Section</label>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="checkbox" class="icheckbox" id='designation'/>Designation</label>
                                        </div>
                                        <div class="col-md-4">                                    
                                            <label class="check"><input type="checkbox" class="icheckbox" id='approvalCode'/>ApprovalCode</label>
                                        </div>
                                    </div>
                                
                                     
                                <!---------Cooulmns to be exported starts here---->     
                                
                                    
                                    <!--- Submit Button starts---> 
                                   
                                   <div class="form-group">
									    <label class="col-md-5 control-label"></label>
                                        <div class="col-md-7">
                                            <button type="button" class="btn btn-info" ng-click="exportTable()">{{subb}}</button>
                                        </div>
                                   </div>
                                    <!--- Submit Button ends---> 
                                
                                <div class="row">
                        <div class="col-md-12">
                            
                            <!-- START DATATABLE EXPORT -->
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Export</h3>
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
                                <center style="margin-top:5.5%;display:none;" id="manojloader" ><img src='img/ajax.gif' ><br><h4 style="color:blue;">Loading</h4></center>
                                <div class="panel-body">
									
                                    <table id="customers2" class="table datatable" >
										
                                        <thead>
                                            <tr>
                                                 <th ng-repeat="(key, val) in names[0]">{{key}}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
   
                                            <tr ng-repeat="name in names">
												<td ng-repeat="(key, val) in name">{{val}}</td>
                                            </tr>
									
                                        </tbody>
                                    </table>                                    
                                    
                                </div>
                            </div>
                            <!-- END DATATABLE EXPORT -->                            
                        </div>
                    </div>
                                
                                
                                </form>
                               </div>
                                  <!---Form ends Here--->
                                  
                                  
                                </div>
                            </div>

                        </div>
                    </div>
                
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                
            </div>            
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        
        
        
        

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
        
        
        
        <script>
	var app = angular.module('exportApp', []);
	app.controller('exportCtrl', function($scope, $http) {
		$scope.subb = "Export";
		$scope.exportTable = function(){
		document.getElementById("manojloader").style.display="block";
		var date1 = document.getElementById("date1").value;
		var date2 = document.getElementById("date2").value;
		var dep = document.getElementById("dep").value;
		$scope.subb = "Exporting....";
		var date = document.getElementById("date").checked;
		var head = document.getElementById("head").checked;
		var proceeding = document.getElementById("proceeding").checked;
		var amount = document.getElementById("amount").checked;
		var account = document.getElementById("account").checked;
		
		var purpose = document.getElementById("purpose").checked;
		var check_no = document.getElementById("check_no").checked;
		
		var to_account = document.getElementById("to_account").checked;
		var payeename = document.getElementById("payeename").checked;
		var type = document.getElementById("type").checked;
		var sectiondep = document.getElementById("sectiondep").checked;
		var designation = document.getElementById("designation").checked;
		var approvalCode = document.getElementById("approvalCode").checked;
    $http.post(apiBase+"getexportdata.php",{date1:date1,date2:date2,dep:dep,date:date,head:head,
		to_account:to_account,
		payeename:payeename,
		type:type,
		sectiondep:sectiondep,
		designation:designation,
		approvalCode:approvalCode,
		proceeding:proceeding,amount:amount,account:account,purpose:purpose,check_no:check_no})
    .success(function (response) { $scope.subb = "Export"; document.getElementById("manojloader").style.display="none";$scope.names = response.records; console.log(response);});
	}});
	</script>
        
        <?php include "footer.php";?> 
