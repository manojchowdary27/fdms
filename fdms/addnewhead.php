<?php include "header.php";?>             
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>                    
                    <li class="active">New Head</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Add a New Payment Head/Receipt Head</h2>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Please Fill  Fields </h3>
                                </div>
                                <div class="panel-body">
                                  
                                 <!---Form Starts Here ---> 
                              <div class="block">                        
                                <form class="form-horizontal" role="form" ng-app="newApp" ng-controller="newCtrl">                                    
                                    
                                     <!-----Confirm box for another payment starts here--->
        
        
        <div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="mb-confirm-error" style="display:none;">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span><strong>Error..!</strong></div>
                    <div class="mb-content">
                        <p><strong><ul><li>You may not have fill all the fields</li>
										<li>File Uploader supports only jpg/png/pdf files</li></ul></strong></p>                    
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
							<button class="btn btn-default btn-lg mb-control-close" onclick="document.getElementById('mb-confirm-error').style.display='none' ">Try Again</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
           <!-----Confirm box for another payment ends here---->
                                    <!--- New Head name starts---> 
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><strong>New Head Name</strong></label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" id="headName" ng-model="headName" />
                                        </div>
                                    </div>
                                    <!--- new Head Name  ends---> 
                                
                                
                                
                                    <!--Head Type starts here--->
                                    <div class="form-group" >
                                        <label class="col-md-4 control-label"><strong>New Head Type:</strong></label>
                                        <div class="col-md-3">                                                                                
                                            <select class="form-control select" data-live-search="true" ng-model="headType" id="headType" >
												<option value="1">Payment Head</option>
												<option value="2">Receipt Head</option> 
                                            </select>
                                            
                                        </div>
                                    </div> 
                                    <!--Head type ends here--->
                                    
                                    <!--- Submit Button starts---> 
                                   <script>
                                   var newApp = angular.module("newApp",[])
												.controller("newCtrl",function($scope,$http){
													
													$scope.createNew=function (){
														 document.getElementById("sub").style.Color="Blue";
        document.getElementById("sub").innerHTML="<p><center><img src='img/loading2.gif' height=30px;/>Loading....</center></p>";

														var data = new FormData();
														var headName =this.headName;
														var headType =document.getElementById("headType").value;

														data.append('headName',headName);
														data.append('headType',headType);
													
														uploadUrl=apiBase+"addNewHead.php"
														 $http.post(uploadUrl, data, {
																					transformRequest: angular.identity,
																					headers: {'Content-Type': undefined,'Process-Data': false}
																	})
																 .success(function(response){
																	 var error= response.saved;
																	 if(error=="yes") document.getElementById("mb-confirm").style.display="block";
																	 else document.getElementById("mb-confirm-error").style.display="block";
																	console.log(response);
																	document.getElementById("sub").style.background="#5bc0de ";
																document.getElementById("sub").style.Color="#ffffff";
																	 document.getElementById("sub").innerHTML="SUBMIT";
																 })
																 .error(function(){
																	console.log("Error");
																	document.getElementById("mb-confirm-error").style.display="block";
																	 document.getElementById("sub").innerHTML="SUBMIT";
																	
																 });
														} 
													});
                                   
                                   
                                   </script>
                                   <div class="form-group">
									    <label class="col-md-5 control-label"></label>
                                        <div class="col-md-7">
                                            <button type="button" id="sub" class="btn btn-info" ng-click="createNew()">SUBMIT</button>
                                        </div>
                                   </div>
                                    <!--- Submit Button ends---> 
                                
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
        
        
        <!-----Confirm box for another payment starts here--->
        
        
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-confirm" style="display:none;">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span><strong>Successfully Added..!</strong></div>
                    <div class="mb-content">
                        <p>Do you want to <strong>Another PayMent</strong></p>                    
                        <p>Press No to go to Dashboard. Press Yes to Add another payment.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
							<button class="btn btn-default btn-lg mb-control-close" onclick="document.getElementById('mb-confirm').style.display='none' ">Yes</button>
                            <a href="index.php" class="btn btn-success btn-lg">No</a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        
        
        
        
        
        <!-----Confirm box for another payment ends here---->
      
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
     <?php include "footer.php"; ?>
