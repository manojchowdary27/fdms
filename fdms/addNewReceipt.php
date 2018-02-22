<?php include "header.php";?>  
<script src="js/apprec.js"></script>           
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>                    
                    <li class="active">New Receipt</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Add a New Receipt</h2>
                </div>                   
                
                <!-- PAGE CONTENT WRAPPER -->
                <div class="page-content-wrap">
                
                    <div class="row">
                        <div class="col-md-12">

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Please Fill All the Fields </h3>
                                </div>
                                <div class="panel-body">
                                  
                                 <!---Form Starts Here ---> 
                              <div class="block">                        
                                <form name="payform" class="form-horizontal" role="form" ng-app="recApp" ng-controller="recCtrl">                                    
                                    
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
                                    
                                    
                                    
                                    
                                    
                                    
                                    <!--date starts-->
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Date</label>
                                        <div class="col-md-3">
                                            <input type="text" name="date" class="form-control datepicker plugin-date" ng-model="date" id="date"><span ng-show="payform.date.$touched && payform.date.$invalid">*Required Field</span>
                                        </div>
                                    </div>
                                    <!--date ends-->
                                    <!--Head/Department Search starts--->
                                    <div class="form-group" >
                                        <label class="col-md-4 control-label">Source/Income Type</label>
                                        <div class="col-md-3">                                                                                
                                            <select class="form-control select" data-live-search="true" ng-model="head" id="dep">
												 <?Php
                                             $sql = mysql_query('select dep_name from incomedep order By hits desc');
											while($res = mysql_fetch_array($sql)){
												echo "<option value=".'"'.$res['dep_name'].'"'.">".$res['dep_name']."</option>";
												 } ?>
                                            </select>
                                            
                                        </div>
                                    </div> 
                                    <!--Head/Department Search ends--->
                                    <!--- Details TextArea--->
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Details</label>
                                        <div class="col-md-3">
                                            <textarea class="form-control" rows="3" ng-model="purpose" ></textarea>
                                        </div>
                                    </div>
                                     
                                    <!--- Details TextArea---> 
                                   
                                    
                                    
                                
                                 <!--- Amount  starts---> 
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><strong>Amount</strong></label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" value="Enter Amount..." ng-model="amount" />
                                        </div>
                                    </div>
                                    <!--- Amount  ends--->  
                                    <!--To account numbers starts here--->
                                    <div class="form-group" >
                                        <label class="col-md-4 control-label"><strong>TO Account Number:</strong></label>
                                        <div class="col-md-3">                                                                                
                                            <select class="form-control select" data-live-search="true" ng-model="from" id="toaccount" >
												<option value="Account1">Account 1</option>
												<option value="Account2">Account 2</option>
												<option value="Account3">Account 3</option>
												<option value="Account4">Account 4</option>
												<option value="Account5">Account 5</option>
												<option value="Account6">Account 6</option>
												 
                                            </select>
                                            
                                        </div>
                                    </div> 
                                    <!--To account numbers ends here--->
                                    
                                    <!--- From account  starts---> 
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><strong>From Account Number:</strong></label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" value="NO Cheque" ng-model="fromaccount" />
                                        </div>
                                    </div>
                                    <!--- From account ends--->
                                    
                                    
                                    <!--- Payee Name starts here---> 
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><strong>Payee Name:</strong></label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control"  ng-model="payeename" />
                                        </div>
                                    </div>
                                    <!--------payname ends here-------->
                                    
                                    
                                    
                                     
                                    <!--- Status Label starts> 
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Status</label>
                                        <label class="switch">
                                                    <input type="checkbox" checked ng-model="status"/>
                                                    <span></span>
										</label>
                                    </div>
                                    <!--- Status Label ends---> 
                                
                                    <!--- File Input starts---> 
                                   <div class="form-group">
                                        <label class="col-md-4 control-label">Choose File:</label>
                                        <div class="col-md-3">
                                            <input type="file" class="fileinput" name="filename1" id="filename1" file-model="myFile"/>
                                        </div>
                                   </div>
                                    <!--- File Input ends---> 
                                    
                                    <!--- Submit Button starts---> 
                                   
                                   <div class="form-group">
									    <label class="col-md-5 control-label"></label>
                                        <div class="col-md-7">
                                            <button type="button" id="sub" class="btn btn-info" ng-click="uploadFile()">SUBMIT</button>
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
