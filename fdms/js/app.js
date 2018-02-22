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
    this.uploadFileToUrl = function(file, uploadUrl, date,head,purpose,proceeding_no,amount,cheque,status,from,to,sectiondep,designation,type,payeename){
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
         
         fd.append('sectiondep', sectiondep);
         fd.append('designation', designation);
         fd.append('type', type);
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

myApp.controller('myCtrl', ['$scope', 'fileUpload', function($scope, fileUpload){
   $scope.uploadFile = function(){
        
        document.getElementById("sub").style.Color="Blue";
        document.getElementById("sub").innerHTML="<p><center><img src='img/loading2.gif' height=30px;/>Loading....</center></p>";

        var file = $scope.myFile;
        var uploadUrl = apiBase+"save_form.php";
        var date = $scope.date;
        var head = $scope.head;
        var purpose = $scope.purpose;
        var proceeding_no=$scope.proceeding_no;
        var amount = $scope.amount;
        var cheque = $scope.cheque;
        var status = true;
        var from = $scope.from;
        var to = $scope.to;
        date = document.getElementById("date").value;
        head = document.getElementById("dep").value;
        from = document.getElementById("fromaccount").value;
       
			var type = document.getElementById("type").value;
          var sectiondep = document.getElementById("department").value;
          var payeename = $scope.payeename; 
        var designation =  document.getElementById("role").value;
        
        fileUpload.uploadFileToUrl(file, uploadUrl, date, head,purpose,proceeding_no,amount,cheque,status,from,to,sectiondep,designation,type,payeename);
   };

}]);
