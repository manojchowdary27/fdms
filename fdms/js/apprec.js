var myApp = angular.module('recApp', []);

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
    this.uploadFileToUrl = function(file, uploadUrl, date, head,purpose,amount,from,to,payeename){
         var fd = new FormData();
         fd.append('file', file);
         fd.append('date', date);
         fd.append('head', head);
         fd.append('purpose', purpose);
         fd.append('amount', amount);
         fd.append('from', from);
         fd.append('to', to);
         fd.append('payeename', payeename);
        
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

myApp.controller('recCtrl', ['$scope', 'fileUpload', function($scope, fileUpload){
   $scope.uploadFile = function(){
        
        document.getElementById("sub").style.Color="Blue";
        document.getElementById("sub").innerHTML="<p><center><img src='img/loading2.gif' height=30px;/>Loading....</center></p>";

        
        var uploadUrl = apiBase+"save_form_rec.php";
        
       var date = document.getElementById("date").value;
       var head = document.getElementById("dep").value;
       var purpose = $scope.purpose;
       var amount = $scope.amount;
       var from = $scope.fromaccount;
       var to = document.getElementById("toaccount").value;
       var payeename = $scope.payeename; 
       var file = $scope.myFile;
        
        fileUpload.uploadFileToUrl(file, uploadUrl, date, head,purpose,amount,from,to,payeename);
   };

}]);
