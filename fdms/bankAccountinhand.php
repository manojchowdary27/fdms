<?php 
include "header.php";
 ?>

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#"></a>Cash In Hand Summary</li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-home"></span> Accounts List</h2>
                </div>                   
                
                <div class="page-content-wrap">
                    <!-- START WIDGETS -->                    
                    <div class="row" ng-app="account" ng-controller="accountCtrl">
						<center style="margin-top:13.5%;display:none;" id="manojloader" ><img src='img/ajax.gif' ><br><h4 style="color:blue;">Loading</h4></center>
						<div class="col-md-3"  ng-repeat="x in names" style="padding:18px;">
							<a href="http://localhost/fdms/eachAccountinhand.php?x={{x.accountNo}}">
                            <div class="widget "` style="border:1px solid #656d78;border-radius:20px;background:#7693BA"ng-click="inc(x.sno)" >
                                                            
                                <div class="widget-data-center">
                                    <div class="widget-title " ng-bind="'  '+x.accountNo" style="font-size:22px;"> &nbsp;Loading...</div>
                                    
                                </div>                                     
                            </div>
                         </a>   
                        </div> 
                                                 
                    </div>
                    </div>
                    <!-- END WIDGETS -->                      
                </div>
                <!-- END PAGE CONTENT WRAPPER -->                                
           

<script>
var app = angular.module('account', []);
app.controller('accountCtrl', function($scope, $http) {
	document.getElementById("manojloader").style.display="block";
    $http.get(apiBase+"getaccount.php")
    .then(function (response) {console.log(response.data.records);
		document.getElementById("manojloader").style.display="none";
		$scope.names = response.data.records;});
   
});
</script>
<?php include "footer.php"; ?>
