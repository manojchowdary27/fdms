var myApp = angular.module('updateApp', []);

myApp.directive('fileModel', ['$parse', function ($parse) {
    return {
    restrict: 'A',
    link: function(scope, element, attrs) {
        var model = $parse(attrs.fileModel);
        var modelSetter = model.assign;

        element.bind('change', function(){
            scope.$apply(function(){
                modelSetter(scope, element[0].files[0]);
            });
        });
    }
   };
}]);

// We can write our own fileUpload service to reuse it in the controller
myApp.service('fileUpload', ['$http', function ($http , $scope) {
    this.uploadFileToUrl = function(uploadUrl, date,accountNo,opening,closing,expen){
         var fd = new FormData();
         fd.append('date', date);
         fd.append('accountNo', accountNo);
         fd.append('opening', opening);
         fd.append('closing', closing);
         fd.append('expen', expen);
         
         $http.post(uploadUrl, fd, {
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
 }]);

myApp.controller('updateCtrl', ['$scope', 'fileUpload', function($scope, fileUpload){
   $scope.uploadFile = function(){
        
        document.getElementById("sub").style.Color="Blue";
        document.getElementById("sub").innerHTML="<p><center><img src='img/loading2.gif' height=30px;/>Loading....</center></p>";
       var uploadUrl = apiBase+"save_form_updatebankinhand.php";
       var date = document.getElementById("date").value;
       var accountNo = document.getElementById("accountno").value;
       var opening = $scope.opening;
       var closing = $scope.closing;
       var expen = $scope.expen;
        fileUpload.uploadFileToUrl(uploadUrl, date,accountNo, opening,closing,expen);
   };

}]);
