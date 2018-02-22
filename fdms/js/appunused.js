var myApp = angular.module('myApp', []);

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
    this.uploadFileToUrl = function(file, uploadUrl, date,head,purpose,proceeding_no,amount,cheque,status,from,to){
         var fd = new FormData();
         fd.append('file', file);
         fd.append('date', date);
         fd.append('head', head);
         fd.append('purpose', purpose);
         fd.append('proceeding_no', proceeding_no);
         fd.append('amount', amount);
         fd.append('cheque', cheque);
         fd.append('status', status);
         fd.append('from', from);
         fd.append('to', to);
         alert("hii");
         $http.post(uploadUrl, fd, {
             transformRequest: angular.identity,
             headers: {'Content-Type': undefined,'Process-Data': false}
         })
         .success(function(response){
			 var error= response.saved;
			 if(error=="yes") document.getElementById("mb-confirm").style.display="block";
			 else document.getElementById("mb-confirm-error").style.display="block";
            console.log(response);
         })
         .error(function(){
            console.log("Error");
            document.getElementById("mb-confirm-error").style.display="block";
         });
     }
 }]);

myApp.controller('myCtrl', ['$scope', 'fileUpload', function($scope, fileUpload){
   $scope.uploadFile = function(){
        var file = $scope.myFile;
        var uploadUrl = apiBase+"save_form.php";
        var date = $scope.date;
        var head = $scope.head;
        var purpose = $scope.purpose;
        var proceeding_no=$scope.proceeding_no;
        var amount = $scope.amount;
        var cheque = $scope.cheque;
        var status = $scope.status;
        var from = $scope.from;
        var to = $scope.to;
        date = document.getElementById("date").value;
        head = document.getElementById("dep").value;
        
        fileUpload.uploadFileToUrl(file, uploadUrl, date, head,purpose,proceeding_no,amount,cheque,status,from,to);
        $scope.errordata = error;
   };

}]);
