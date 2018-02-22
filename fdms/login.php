<?php session_start(); if(isset($_SESSION['username'])) header('location:index.php'); ?>
<!DOCTYPE html>
<html lang="en" class="body-full-height">
    <head>        
        <!-- META SECTION -->
        <title>FDMS-RGUKTN</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- END META SECTION -->
        <script>
        var apiBase = "http://10.4.43.227/php/"; </script>
        <!-- CSS INCLUDE -->        
        <link rel="stylesheet" type="text/css" id="theme" href="css/theme-default.css"/>
        <script src="js/angular.min.js"></script>
        <!-- EOF CSS INCLUDE -->                                    
    </head>
    <body>
        
        <div class="login-container" ng-app="loginApp" ng-controller="loginCtrl">
        <div ng-bind-html="error"></div>
            <div class="login-box animated fadeInDown">
                <div class="login-logo">Digital Finanance</div>
                <div class="login-body">
                    <div class="login-title"><strong>Welcome</strong>, Please login</div>
                    
                    <form  class="form-horizontal" ng-submit="login()" >
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="text" class="form-control" placeholder="Username" ng-model="user"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <input type="password" class="form-control" placeholder="Password" ng-model="pwd"/>
                        </div>
                    </div>
                    <div class="form-group">
                        
                        <div class="col-md-6 pull-right">
                            <button class="btn btn-info btn-block" ng-bind="loginbut"></button>
                        </div>
                    </div>
                    </form>
                </div>
                <div class="login-footer">
                    <div class="pull-left">
                        &copy; 2017 Rgukt-Nuzvid
                    </div>
                    <div class="message-box message-box-danger animated fadeIn" data-sound="fail" id="message-box-sound-2" >
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-times"></span>Sorry,Wrong Username/Password</div>
                    <div class="mb-content">
                        <p>You have Entered Invalid Details</p>
                        <p>Please Check CapsLock and Try again!</p>                    
                    </div>
                    <div class="mb-footer">
                        <button class="btn btn-default btn-lg pull-right mb-control-close" ng-click="close()" id="closer">Close</button>
                    </div>
                </div>
            </div>
        </div>
                    <div class="pull-right">
                        <a href="#">About</a> 
                        |
                        <a href="#">Privacy</a> |
                        <a href="#">Contact Us</a>
                    </div>
                </div>
            </div>
            
        </div>
        <script>
			var loginApp = angular.module("loginApp",[]);
			loginApp.controller('loginCtrl', function($scope, $http,$window,$sce ) {
				$scope.error="";
				$scope.loginbut="Login";
				$scope.close = function(){document.getElementById('message-box-sound-2').style.display="none";}
				$scope.login = function(){
					$scope.loginbut="Verifying...";
					$http.post(apiBase+"login/index.php",{user:$scope.user,pwd:$scope.pwd})
					.then(function(response){ 
						console.log(response);
						if(response.data.access=="allow") $window.location.href="index.php";
						else{
							var manoj =""; 
							$scope.loginbut="Login";
							document.getElementById('message-box-sound-2').style.display="block";
							console.log(response);
						console.log(response.data.access);
						}
						});
					}
				});
			</script>
        
    </body>
</html>






