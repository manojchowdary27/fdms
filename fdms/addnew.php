<?php include "header.php";?>  
<script src="js/app.js"></script>           
                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="index.php">Home</a></li>                    
                    <li class="active">New Payment</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-arrow-circle-o-left"></span>Add a New Payment</h2>
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
                                <form name="payform" class="form-horizontal" role="form" ng-app="myApp" ng-controller="myCtrl">                                    
                                    
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
                                        <label class="col-md-4 control-label">Head/Category</label>
                                        <div class="col-md-3">                                                                                
                                            <select class="form-control select" data-live-search="true" ng-model="head" id="dep">
												 <?Php
                                             $sql = mysql_query('select dep_name from f_dep order By hits desc');
											while($res = mysql_fetch_array($sql)){
												echo "<option value=".'"'.$res['dep_name'].'"'.">".$res['dep_name']."</option>";
												 } ?>
                                            </select>
                                            
                                        </div>
                                    </div> 
                                    <!--Head/Department Search ends--->
                                    
                                    <!--- Purpose TextArea--->
                                    
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Purpose</label>
                                        <div class="col-md-3">
                                            <textarea class="form-control" rows="3" ng-model="purpose" ></textarea>
                                        </div>
                                    </div>
                                     
                                    <!--- Purpose TextArea---> 
                                   
                                    <!--- Proceeding Numer starts---> 
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><strong>Proceeding Number</strong></label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" value="Enter Proceeding Number" ng-model="proceeding_no" />
                                        </div>
                                    </div>
                                    <!--- Proceeding Number ends---> 
                                
                                
                                
                                    <!--Payment Type starts here--->
                                    <div class="form-group" >
                                        <label class="col-md-4 control-label"><strong>Payment Type:</strong></label>
                                        <div class="col-md-3">                                                                                
                                            <select class="form-control select" data-live-search="true" ng-model="from" id="type" >
												<option value="Advance">AdvancePayment</option>
												<option value="Bill Settlement">Bill Settlement</option> 
                                            </select>
                                            
                                        </div>
                                    </div> 
                                    <!--payment type ends here--->
                                    
                                    <!--Departments/section starts here--->
                                    <div class="form-group" >
                                        <label class="col-md-4 control-label"><strong>Deparment/sections:</strong></label>
                                        <div class="col-md-3">                                                                                
                                            <select class="form-control select" data-live-search="true" ng-model="from" id="department" >
												<option value="CSE">CSE</option>
												<option value="ECE">ECE</option>
												<option value="ME">MECHANICAL</option>
												<option value="CE">CIVIL</option>
												<option value="MME">MME</option>
												<option value="CHE">CHEMICAL</option>
												<option value="PHYSICS">PHYSICS</option>
												<option value="CHEMISTRY">CHEMISTRY</option>
												<option value="MATHS">MATHS</option>
												<option value="ENGLISH">ENGLISH</option>
												<option value="PROCUREMENT">PROCUREMENT</option>
												<option value="ESTABLISHMENT">ESTABLISHMENT</option>
												<option value="ESTABLISHMENT">SPORTS</option>
												<option value="ESTABLISHMENT">HOSPITAL</option>
												<option value="OTHERS">OTHERS</option> 
                                            </select>
                                            
                                        </div>
                                    </div> 
                                    <!--Departments/sections ends here--->
                                    
                                    
                                    
                                    
                                    <!--Designastion starts here--->
                                    <div class="form-group" >
                                        <label class="col-md-4 control-label"><strong>Designation:</strong></label>
                                        <div class="col-md-3">                                                                                
                                            <select class="form-control select" data-live-search="true" ng-model="from" id="role" >
												<option value="TEACHING">TEACHING</option>
												<option value="NON-TEACHING">NON-TEACHING</option> 
												<option value="ADMINSTRATION">ADMINSTRATION</option> 
												<option value="OTHERS">OTHERS</option> 
                                            </select>
                                            
                                        </div>
                                    </div> 
                                    <!--Designation ends here--->
                                    
                                    
                                    
                                
                                 <!--- Amount  starts---> 
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><strong>Amount</strong></label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" value="Enter Amount..." ng-model="amount" />
                                        </div>
                                    </div>
                                    <!--- Amount  ends---> 
                                    
                                    <!--- Amount  starts---> 
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><strong>Cheque Number:</strong></label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" value="NO Cheque" ng-model="cheque" />
                                        </div>
                                    </div>
                                    <!--- Amount  ends--->
                                    
                                    <!--From account numbers starts here--->
                                    <div class="form-group" >
                                        <label class="col-md-4 control-label"><strong>From Account Number:</strong></label>
                                        <div class="col-md-3">                                                                                
                                            <select class="form-control select" data-live-search="true" ng-model="from" id="fromaccount" >
												<option value="Account1">Account 1</option>
												<option value="Account2">Account 2</option>
												<option value="Account3">Account 3</option>
												<option value="Account4">Account 4</option>
												<option value="Account5">Account 5</option>
												<option value="Account6">Account 6</option>
												 
                                            </select>
                                            
                                        </div>
                                    </div> 
                                    <!--from account numbers ends here--->
                                    
                                    <!--- To account  starts---> 
                                    <div class="form-group">
                                        <label class="col-md-4 control-label"><strong>To Account Number:</strong></label>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" value="NO Cheque" ng-model="to" />
                                        </div>
                                    </div>
                                    <!--- To account ends--->
                                    
                                    
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
