<?php 
include "header.php";
 ?>

                <!-- START BREADCRUMB -->
                <ul class="breadcrumb">
                    <li><a href="#" class="active">Home</a></li>
                    <li><a href="#"></a></li>
                </ul>
                <!-- END BREADCRUMB -->                
                
                <div class="page-title">                    
                    <h2><span class="fa fa-home"></span> Dashboard</h2>
                </div>                   
                
                <div class="page-content-wrap">
                    <!-- START WIDGETS -->                    
                    <div class="row" ng-app="dashboard" ng-controller="dashboardCtrl">
						<center style="margin-top:13.5%;display:none;" id="manojloader" ><img src='img/ajax.gif' ><br><h4 style="color:blue;">Loading</h4></center>
						<div class="col-md-3"  ng-repeat="x in names" style="padding:18px;">
							<a href="http://10.4.43.227/fdms/each.php?x={{x.dep}}">
                            <div class="widget " ng-if="$even" style="border:1px solid #656d78;border-radius:20px;background:#7693BA"ng-click="inc(x.sno)" >
                                                            
                                <div class="widget-data-center">
                                    <div class="widget-title fa fa-inr" ng-bind="'  '+x.totalamount" style="font-size:22px;"> &nbsp;Loading...</div>
                                    <div class="widget-title" style="margin-top:5%;"ng-bind="x.dep">Loading...</div>
                                </div>                                     
                            </div>
                         </a>   
                         <?php 
                         
                         

                         
                         ?>
                         <a href="http://10.4.43.227/fdms/each.php?x={{x.dep}}">
                            <div class="widget " ng-if="$odd" style="border:1px solid #656d78;border-radius:20px;background:#7693BA"ng-click="inc(x.sno)" >
                                                            
                                <div class="widget-data-center">
                                    <div class="widget-title fa fa-inr" ng-bind="'  '+x.totalamount" style="font-size:22px;"></div>
                                    <div class="widget-title" style="margin-top:5%;"ng-bind="x.dep">Loading...</div>
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
var app = angular.module('dashboard', []);
app.controller('dashboardCtrl', function($scope, $http) {
	document.getElementById("manojloader").style.display="block";
    $http.get(apiBase+"getdep.php")
    .then(function (response) {console.log(response.data.records);
		document.getElementById("manojloader").style.display="none";
		$scope.names = response.data.records;});
   $scope.inc = function(sno){
		$http.post(apiBase+"incdep.php",{sno: sno})
		.then(function(response){console.log(response+"incremented");});
		}
});
</script>
<?php include "footer.php"; ?>
